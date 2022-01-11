@extends('layouts.layout')

<head>
    <title>Movie - Details</title>


<style>

    @media(max-width: 1600px){

        h1{
            font-weight: bold !important;
            width: 50%;
            margin-top: 2% !important;
            text-decoration: underline red;
        }

        h4{
            font-weight: bold !important;
        }

        .details{
            color: white;
            padding: 2%;
            text-align: justify;
        }

        img{
            width: 100%;
            height: 70%;
            object-fit: cover;
            object-position: top;
            /* box-shadow: inset 0px 0px 20px 10px rgba(0, 0, 0, 0.6); */
        }
    }

    @media(max-width: 767px){
        img{
            height: 30%;
        }
    }


</style>

</head>

@section('content')

    <div class="details">
        <img src="{{asset('covers/'.$movie->movie_cover)}}" alt="">
        <h1>{{ $movie->movie_name }}</h1>
        <ul>
            <li>Ratings: {{ $movie->ratings }}</li>
            <li>Year: {{ $movie->year }}</li>
        </ul>
        <h4>Synopsis:</h4>
        <p>{{ $movie->movie_description }}</p>
    </div>


    
@endsection