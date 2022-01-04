<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use Illuminate\Validation\Rules\Unique;

class MovieController extends Controller
{
    //

    public function show(){
        $movielist = Movies::all();
        return view('admin.viewMovies', compact('movielist'));
    }

    public function addMovie(Request $request){
        $movie = new Movies();
        if ($request->hasFile('movie_cover')){
            $file = $request->file('movie_cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $movie->movie_cover = $filename;
            $file->move('covers/', $filename);
        }else{
            $movie->movie_cover = 'defaultImg.jpg';
        }

        $movie->movie_name = $request->input('movie_name');
        $movie->movie_description = $request->input('movie_description');
        $movie->ratings = $request->input('ratings');
        $movie->year = $request->input('year');

        $movie->save();

        return redirect('/viewMovies');
    }
}
