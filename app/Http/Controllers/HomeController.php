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
        $movies = Movies::all();

        $screen = array();
        foreach ($showlist as $show) {
            $movieID = $show->movie_id;
            $movielist = Movies::where('id', $movieID)->get();
            // print_r($movielist);

            $screen1 = array($show->id, $show->movie_id, $show->show_day, $show->movie_time, $movielist[0]->movie_name, $movielist[0]->year, $movielist[0]->ratings, $movielist[0]->movie_cover);
            array_push($screen, $screen1);

        }

        foreach ($screen as $s) {
            
            print_r($s);
        }

    

        return view('/admin/home', compact('movies', 'screen'));
    }
}
