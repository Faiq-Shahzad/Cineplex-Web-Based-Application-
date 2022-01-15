@extends('layouts.layout')

<head>
    <title>All Movies</title>

    <style>
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
    </style>
</head>

@section('content')

    <h1>Screening Now</h1>

    @php ($movies = [])

    @foreach ($movielist as $item)

        <div class="card col-xl-3 mx-3 my-3 bg-dark text-white" style="width: 18rem;">
            <img src="{{asset('covers/'.$item->movie_cover)}}" class="card-img-top" alt="..." height="150-px">
            <div class="card-body">
                <h5 class="card-title">{{ $item->movie_name }}</h5>
                <p class="card-text">Year: {{ $item->year }}</p>
                <p class="card-text">Ratings: {{ $item->ratings }}</p>
                <a href="viewMovies/{{ $item->id }}" class="btn btn-primary">details</a>
            </div>
        </div>
        @php (array_push($movies, $item))
    @endforeach 
    
@endsection