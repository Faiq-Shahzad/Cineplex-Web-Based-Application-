<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Shows;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
    //

    public function show(){
        $show = Shows::all();
        return view('admin.viewShows', compact('show'));
    }

    public function addMovie(Request $request){
        $show = new Shows();

        $movie_name = $request->input('movie_name');

        $movie_id = Movies::where('movie_name', $movie_name)->get('id');

        $show->movie_id = $movie_id;

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

        $review->user_id = $user_id;
        $review->movie_id = $id;
        $review->movie_review = $request->input('movie_review');

        $review->save();

        return redirect('/home')->with('status', 'Review Added Successfully');
    }

    public function moviedetails($id){
        $movie = Movies::find($id);
        $user = Auth::user();


        return view('/detailsMovie', compact('movie', 'user'));
    }

    public function adminaddreview(Request $request, $id, $user_id){

        $review = new Review();

        $review->user_id = $user_id;
        $review->movie_id = $id;
        $review->movie_review = $request->input('movie_review');

        $review->save();

        return redirect('/admin/home')->with('status', 'Review Added Successfully');
    }

    public function adminmoviedetails($id){
        $movie = Movies::find($id);
        $user = Auth::user();


        return view('/admin/detailsMovie', compact('movie', 'user'));
    }
}
