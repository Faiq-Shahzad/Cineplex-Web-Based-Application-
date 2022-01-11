<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function show(){
        $userlist = User::all();
        return view('admin.viewUsers', compact('userlist'));
    }

    public function viewprofile($id){

        $user = User::find($id);
        return view('profile', compact('user'));
    }

    public function viewabout(){

        $user = Auth::user();
        return view('admin.aboutUs', compact('user'));

        // if (Auth::check()){
        //     if (Auth::user()->user_role == '1'){
    
        //     }else{
        //         return redirect('/home')->with('status', 'User accessed about');
        //     }
            
        // }else{
        //     return redirect('/login')->with('status', 'Please Login');
        // }


        
    }

    

    // public function addMovie(Request $request){
    //     $movie = new Movies();
    //     if ($request->hasFile('movie_cover')){
    //         $file = $request->file('movie_cover');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time().'.'.$extension;
    //         $movie->movie_cover = $filename;
    //         $file->move('covers/', $filename);
    //     }else{
    //         $movie->movie_cover = 'defaultImg.png';
    //     }

    //     $movie->movie_name = $request->input('movie_name');
    //     $movie->movie_description = $request->input('movie_description');
    //     $movie->ratings = $request->input('ratings');
    //     $movie->year = $request->input('year');

    //     $movie->save();

    //     return redirect('/admin/viewMovies')->with('status', 'Movie Added Successfully');
    // }

    // public function edit($id){

    //     $movie = Movies::find($id);

    //     return view('admin.editMovies', compact('movie'));
    // }

    // public function update(Request $request, $id){

    //     $movie = Movies::find($id);
        
    //     if ($request->hasFile('movie_cover')){
    //         $filepath = 'covers/'.$movie->movie_cover;

    //         if (File::exists($filepath) && $movie->movie_cover != 'defaultImg.png'){
    //             File::delete($filepath);
    //         }

    //         $file = $request->file('movie_cover');
    //         $extension = $file->getClientOriginalExtension();
    //         $filename = time().'.'.$extension;
    //         $movie->movie_cover = $filename;
    //         $file->move('covers/', $filename);
    //     }

    //     $movie->movie_name = $request->input('movie_name');
    //     $movie->movie_description = $request->input('movie_description');
    //     $movie->ratings = $request->input('ratings');
    //     $movie->year = $request->input('year');

    //     $movie->update();

    //     return redirect('/admin/viewMovies')->with('status', 'Movie Updated Successfully');
    // }

    // public function delete($id){
    //     $movie = Movies::find($id);
        
    //     $movie->delete();

    //     return redirect('/admin/viewMovies')->with('status', 'Movie Deleted Successfully');
    // }

    // public function review($id){
    //     $reviews = Review::where('movie_id', $id)->get();
    //     $movie = Movies::find($id);

    //     return view('/admin/reviewsMovies', compact('reviews', 'movie'));
    // }
}
