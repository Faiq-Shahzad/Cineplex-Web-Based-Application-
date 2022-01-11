@extends('layouts.layout')

<head>
    <title>Cineplex - Home</title>
</head>

<style>
    .alert{
        width: 25%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 2%;
        text-align: center;
        border: 2px solid green !important;
    }

    .slide{
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    div .caption{
        position: absolute !important;
        color: white !important;
    }

    .carousel-item > img{
        width: 100%;
        object-fit: cover;
        object-position: center;
    }

    .carousel-item > .d-block{
        height: 700px;
    }

    @media(max-width: 767px){

        .carousel-item > .d-block{
            height: 200px;
        }
    }

    </style>



@section('content')

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
        <div class="carousel-inner">

            @php ($movie_covers = [])

            @foreach ($movielist as $movie)
                @php (array_push($movie_covers, asset('covers/'.$movie->movie_cover)))
            @endforeach

            @php ($random = array_rand($movie_covers, 5))

            <div class="carousel-item active">
                <img src="{{ $movie_covers[$random[0]] }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ $movie_covers[$random[1]] }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ $movie_covers[$random[2]] }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ $movie_covers[$random[3]] }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ $movie_covers[$random[4]] }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h1>Random Movies</h1>

    <div class="home_movies container">

        <div class="row">
            @foreach ($movielist as $item)
                <div class="card col-xl-3 mx-2 my-2 bg-dark text-white" style="width: 18rem;">
                    <img src="{{asset('covers/'.$item->movie_cover)}}" class="card-img-top" alt="..." height="150-px">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->movie_name}}</h5>
                        <p class="card-text">{{$item->year}}</p>
                        <a href="/viewMovies/{{$item->id}}" class="btn btn-primary">details</a>
                    </div>
                </div>
            @endforeach
        </div>

        
        
        
        
    </div>

@endsection 

<script>
    setTimeout(function(){
        $('.alert').slideUp(1500);
    }, 2000);
</script>

