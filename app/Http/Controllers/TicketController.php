<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Shows;
use App\Models\User;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller{

    public function bookticket($id){

        $movie = Movies::find($id);
        $user = Auth::user();

        return view('/bookTickets', compact('movie', 'user'));
    }

}

?>