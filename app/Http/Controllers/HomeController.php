<?php

namespace App\Http\Controllers;
use App\Models\machine_name;
use App\Models\machinery;
use Illuminate\Http\Request;
use App\Models\machine_category;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $category =  1;// machine_category::where('status',1)->count();
       $machinery = 1;// machinery::where('status',1)->count();
       $machine_name = 1;// machine_name::count();
        return view('home',compact('category','machinery','machine_name'));
    }

    public function profile(){ 
        return view('profile');
    }
    
}
