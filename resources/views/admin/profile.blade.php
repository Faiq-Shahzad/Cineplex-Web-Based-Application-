@extends('layouts.adminlayout')

@section('title') Admin - Profile @endsection

@section('style')

<style>

    @media(max-width: 1600px){

        h1{
            color: white;
            border-bottom: 4px solid red;
            font-weight: bold !important;
            text-align: center;
            width: 30%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 2% !important;
        }

        h4{
            font-weight: bold !important;
        }

        h5{
            font-weight: bold !important;
        }

        .details{
            color: white;
            padding: 2%;
            text-align: justify;
            font-size: 18px;
        }

        .profile{
            margin-left: auto !important;
            margin-right: auto !important;
            width: 70%;
        }

        form .row{
            margin-top: 3% !important;
        }

    }
/* 
    @media(max-width: 767px){

    } */


</style>

@endsection


@section('content')

    <div class="details">
        <h1>Profile</h1>
        
        <form class="profile">
            @csrf
            
            <div class="row">
                <label class="offset-xl-4 col-xl-1 col-2">User ID:</label>
                <input type="text" class="col-xl-3 col-3" value= '{{$user->id}}'>
            </div>
            <div class="row">
                <label class="offset-xl-4 col-xl-1 col-2">Name:</label>
                <input type="text" class="col-xl-3 col-3" value='{{$user->name}}'>
            </div>
            <div class="row">
                <label class="offset-xl-4 col-xl-1 col-2">Email:</label>
                <input type="text" class="col-xl-3 col-3" value='{{$user->email}}'>
            </div>
        </form>
    </div>
    
@endsection