@extends('layouts.layout')

@section('content')

    <img src="{{asset('covers/'.$movie->movie_cover)}}" alt="">
    <h1>{{ $movie->movie_name }}</h1>
    <ul>
        <li>Ratings: {{ $movie->ratings }}</li>
        <li>Year: {{ $movie->year }}</li>
    </ul>
    <h5>Synopsis:</h5>
    <p>{{ $movie->movie_description }}</p>


    
@endsection