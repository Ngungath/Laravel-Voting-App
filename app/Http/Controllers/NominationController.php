<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNominationRequest;
use App\Http\Requests\UpdateNominationRequest;
use App\Repositories\NominationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Nomination;
use App\Models\Voting;
use App\Models\NominationUser;
use App\Models\Categories;

class NominationController extends AppBaseController
{
    /** @var  NominationRepository */
    private $nominationRepository;

    public function __construct(NominationRepository $nominationRepo)
    {
        $this->nominationRepository = $nominationRepo;
    }

    /**
     * Display a listing of the Nomination.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nominationRepository->pushCriteria(new RequestCriteria($request));
        $nominations = $this->nominationRepository->all();

        return view('nominations.index')
            ->with('nominations', $nominations);
    }

    //Vote function

    public function vote(Request $request){


        //create vote
        //update nomination voting count
        //redirect
        if (Auth::check()) {
            $checkVotes =Voting::where('user_id',Auth::user()->id)
                                ->where('category_id',$request->category_id)->first();

            if ($checkVotes) {
               Flash::error("You have voted before for this category ");

                return redirect()->back();  
            }
            $voting = Voting::create([
              'user_id'=>Auth::user()->id,
              'category_id'=>$request->category_id,
              'nomination_id'=>$request->nomination_id
            ]);
           //Get the current number of votes and increase it by 1
            $getNomination = Nomination::where('id',$request->nomination_id)->first();

            $update_vote = Nomination::where('id',$request->nomination_id)->update(['no_of_votes'=>$getNomination->no_of_votes+1]);
            if ($update_vote) {
                Flash::success("You have voted successfully");

                return redirect()->back();
            }
        }

    }

    /**
     * Show the form for creating a new Nomination.
     *
     * @return Response
     */
    public function create()
    {   $nominations =Nomination::all();
        return view('nominations.create')->with('nomination',$nominations);
    }

    /**
     * Store a newly created Nomination in storage.
     *
     * @param CreateNominationRequest $request
     *
     * @return Response
     */
    public function store(CreateNominationRequest $request)
    {
        $input = $request->all();



        $this->validate($request,[
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:50048',

        ]);


        $image = $request->file('image');
        //get the name of the image
        $input['imagename']=$image->getClientOriginalName();
        //dd($image);

        $input['user_id']=Auth::user()->id;
        //check the existing no of nomination in the database and then add 1
        $nominationCheck = Nomination::where('name',$request->input('name'))->first();
         

        if ($nominationCheck) {


        //if exist
            //increase the number of nomination
            if ($nominationCheck['user_id'] != Auth::user()->id) {
              $no_of_nomination = $nominationCheck['no_of_nomination'];
               $input['no_of_nomination']=$no_of_nomination + 1;

                $this->nominationRepository->update($input, $nominationCheck['id']);

               //Create Nomination user table to track which user made which nomination 
               $nominationUpload = NominationUser::create([
                'user_id'=>Auth::user()->id,
                'category_id'=>$request->input('category_id'),
                'nomination_id'=>$nominationCheck['id']
               ]);


            }
          
        }else{


        //if nomination does not exists ,create new one
        $no_of_nomination = 0; 
        $input['image']=$input['imagename'];
        $nomination = $this->nominationRepository->create($input);

      if ($nomination) {

            //chose where to save the image in the laravel app
            $destinationPath = public_path('storage/upload/images');
          //  dd($destinationPath);
            $image->move($destinationPath,$input['imagename']);
         }

        //and track which created which nomiantion
       $nominationUpload = NominationUser::create([
        'user_id'=>Auth::user()->id,
        'category_id'=>$request->input('category_id'),
        'nomination_id'=>$nomination->id
        ]);

     }

       



        Flash::success('Nomination submited successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified Nomination.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        return view('nominations.show')->with('nomination', $nomination);
    }

    /**
     * Show the form for editing the specified Nomination.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);
        $categories =Categories::all();

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        return view('nominations.edit')->with('nomination', $nomination)
                                       ->with('categories',$categories);
    }

    /**
     * Update the specified Nomination in storage.
     *
     * @param  int              $id
     * @param UpdateNominationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNominationRequest $request)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('categories.show',['id'=>$id]));
        }

        $nomination = $this->nominationRepository->update($request->all(), $id);

        Flash::success('Nomination updated successfully.');

        return redirect(route('categories.show',['id'=>$id]));
    }

    /**
     * Remove the specified Nomination from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nomination = $this->nominationRepository->findWithoutFail($id);

        if (empty($nomination)) {
            Flash::error('Nomination not found');

            return redirect(route('nominations.index'));
        }

        $this->nominationRepository->delete($id);

        Flash::success('Nomination deleted successfully.');

        return redirect(route('nominations.index'));
    }
}
