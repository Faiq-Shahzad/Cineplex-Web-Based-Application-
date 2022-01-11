<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

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
            $movie->movie_cover = 'defaultImg.png';
        }

        $movie->movie_name = $request->input('movie_name');
        $movie->movie_description = $request->input('movie_description');
        $movie->ratings = $request->input('ratings');
        $movie->year = $request->input('year');

        $movie->save();

        return redirect('/admin/viewMovies')->with('status', 'Movie Added Successfully');
    }

    public function edit($id){

        $movie = Movies::find($id);

        return view('admin.editMovies', compact('movie'));
    }

    public function update(Request $request, $id){

        $movie = Movies::find($id);
        
        if ($request->hasFile('movie_cover')){
            $filepath = 'covers/'.$movie->movie_cover;

            if (File::exists($filepath) && $movie->movie_cover != 'defaultImg.png'){
                File::delete($filepath);
            }

            $file = $request->file('movie_cover');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $movie->movie_cover = $filename;
            $file->move('covers/', $filename);
        }

        $movie->movie_name = $request->input('movie_name');
        $movie->movie_description = $request->input('movie_description');
        $movie->ratings = $request->input('ratings');
        $movie->year = $request->input('year');

        $movie->update();

        return redirect('/admin/viewMovies')->with('status', 'Movie Updated Successfully');
    }

    public function delete($id){
        $movie = Movies::find($id);
        
        $movie->delete();

        return redirect('/admin/viewMovies')->with('status', 'Movie Deleted Successfully');
    }

    public function review($id){
        $reviews = Review::where('movie_id', $id)->get();
        $movie = Movies::find($id);

        return view('/admin/reviewsMovies', compact('reviews', 'movie'));
    }

    public function addreview(Request $request, $id, $user_id){

        $review = new Review();
        $review->movie_id = $id;
        $review->user_id = $user_id;
        $review->movie_name = $request->input('movie_review');
    }

    public function moviedetails($id){
        $movie = Movies::find($id);
        $user = Auth::user();


        return view('/detailsMovie', compact('movie', 'user'));
    }
}
