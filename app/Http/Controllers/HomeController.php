<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use App\Models\Shows;


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
        $movielist = Movies::all();
        return view('/home', compact('movielist'));
    }



    //UNDER WORKS-=------START FROM HERE-------------------

    public function adminindex(){
        $showlist = Shows::all();

        foreach ($showlist as $show) {
            $movieID = $show->movie_id;
            $movielist = Movies::where('id', $movieID)->get();
        }

        return view('/admin/home', compact('movielist'));
    }
}
