<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Categories;
Use App\Models\Nomination;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $cotegories_count = Categories::count();
        $nominations_count = Nomination::count();
        //dd($cotegories_count);
        return view('home')
               ->with('cotegories_count',$cotegories_count)
               ->with('nominations_count',$nominations_count);
    }
}
