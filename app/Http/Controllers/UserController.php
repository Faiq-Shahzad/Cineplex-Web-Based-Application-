<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Feedbacks;
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
        return view('/admin/profile', compact('user'));
    }

    public function userviewprofile($id){

        $user = User::find($id);
        return view('/profile', compact('user'));
    }
    public function feedbacks(){
        $feedbacks = Feedbacks::all();
        return view('/admin/feedbacks', compact('feedbacks'));
    }
}
