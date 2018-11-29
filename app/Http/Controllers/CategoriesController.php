<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoriesRequest;
use App\Http\Requests\UpdateCategoriesRequest;
use App\Repositories\CategoriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\NominationUser;
use App\Models\Nomination;
use App\Models\Categories;
use App\Models\Voting;
use Auth;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategoriesController extends AppBaseController
{
    /** @var  CategoriesRepository */
    private $categoriesRepository;

    public function __construct(CategoriesRepository $categoriesRepo)
    {
        $this->categoriesRepository = $categoriesRepo;
    }

    /**
     * Display a listing of the Categories.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoriesRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoriesRepository->all();
        // $nominations = Nomination::all();
        // $nomination_selected =Nomination::where('is_admin_selected',1)->get();
        if (Auth::user()->role_id == 4) {
                    return view('categories.election-index')
            ->with('categories', $categories);
        }
        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Categories.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Categories in storage.
     *
     * @param CreateCategoriesRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoriesRequest $request)
    {
        //$input = $request->all();

       // dd($input);

        $this->validate($request,[
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5048',

        ]);

        
        if ($request->file('image')) {

        $image = $request->file('image'); 
          //get the name of the image
        $input['imagename']=$image->getClientOriginalName();
        $data['image'] = $input['imagename'];
        }
        
        $data=$request->all();
        $data['user_id'] = Auth::user()->id;
       

        $categoryUpload = Categories::create($data);

         if ($categoryUpload && $request->file('image')) {

            //chose where to save the image in the laravel app
            $destinationPath = public_path('storage/upload/images');
          //  dd($destinationPath);
            $image->move($destinationPath,$input['imagename']);
         }

       // $categories = $this->categoriesRepository->create($input);

        Flash::success('Categories saved successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified Categories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categories = $this->categoriesRepository->findWithoutFail($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        //check if this user as nominated somene in this category before
        //as user can nominate only one user per category
        $hasNominatedBefore = 0;
        $nomianationUser =NominationUser::where('user_id',Auth::user()->id)
                                          ->where('category_id',$id)->first();

        $nominations = Nomination::all();
        $nomination_selected =Nomination::where('is_admin_selected',1)->get();


        //check if the user have nominated in this category before 
        $checkVotes =Voting::where('user_id',Auth::user()->id)
                                ->where('category_id',$categories->id)->first();
                               // dd($checkVotes);

            if ($checkVotes) {
              // Flash::error("You have voted before for this category ");
                    }


           $nomination =0;

        if ($nomianationUser) {
           $hasNominatedBefore = 1;
           //get the detail of the nomination the user has made
           $nomination = Nomination::find($nomianationUser['nomination_id']);

            }

            $nextCategory = Categories::where('id','>',$id)->first();
            $previousCategory = Categories::where('id','<',$id)->first();

            if (Auth::user()->role_id == 4) {
               return view('categories.election-show')->with('categories', $categories)
                                        ->with('nominations',$nominations)
                                          ->with('nomination_selected',$nomination_selected)
                                          ->with('hasNominatedBefore',$hasNominatedBefore)
                                          ->with('nomination',$nomination)
                                          ->with('checkVotes',$checkVotes)
                                          ->with('nextCategory',$nextCategory)
                                          ->with('previousCategory',$previousCategory);
            }
           
            return view('categories.show')->with('categories', $categories)
                                        ->with('nominations',$nominations)
                                          ->with('nomination_selected',$nomination_selected)
                                          ->with('hasNominatedBefore',$hasNominatedBefore)
                                          ->with('nomination',$nomination)
                                          ->with('checkVotes',$checkVotes)
                                          ->with('nextCategory',$nextCategory)
                                          ->with('previousCategory',$previousCategory);
       
          
    }

    /**
     * Show the form for editing the specified Categories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categories = $this->categoriesRepository->findWithoutFail($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('categories', $categories);
    }

    /**
     * Update the specified Categories in storage.
     *
     * @param  int              $id
     * @param UpdateCategoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoriesRequest $request)
    {
        $categories = $this->categoriesRepository->findWithoutFail($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        $categories = $this->categoriesRepository->update($request->all(), $id);

        Flash::success('Categories updated successfully.');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified Categories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categories = $this->categoriesRepository->findWithoutFail($id);

        if (empty($categories)) {
            Flash::error('Categories not found');

            return redirect(route('categories.index'));
        }

        $this->categoriesRepository->delete($id);

        Flash::success('Categories deleted successfully.');

        return redirect(route('categories.index'));
    }
}
