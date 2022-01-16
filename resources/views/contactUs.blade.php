@extends('layouts.layout')

@section('title') Cineplex - Contact Us @endsection

@section('style')

<style>
    h3{
        font-weight: bold !important;
    }
</style>
    
@endsection


@section('content')

    <form action="/contactUs" method="post">

        @csrf
        
        <h3>Contact Us</h3>

        <label>Your Full Name: </label><br>
        <input id="name" type="text" name="name" required>
        <br>
        <label>Your Email Address: </label><br>
        <input id="mail" type="email" name="mail" required>
        <br>
        <label>Feedback: </label><br>
        <textarea name="txt" id="txt" cols="30" rows="10" required></textarea>
        <br>
        <button>Submit</button>
        <br><br><br><br>

        <h6> All Rights Reserved</h6>

    </form>
    
@endsection