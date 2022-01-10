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
        height: 650px;
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

    {{-- <section class="home-slider">
       
        <div id="carouselExampleIndicators" class="carousel  carousel-fade  slide" data-bs-ride="carousel"data-bs-interval="3000">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset('covers/sm.jpg')}}" class="d-block w-100" alt="..." style="height: 90vh; object-fit:cover; object-position: center;">
            </div>
            <div class="carousel-item">
              <img src="{{asset('assets/uploads/cover/cover1.jpg')}}" class="d-block w-100" alt="..." style="height: 90vh; object-fit:cover; object-position: right;">
            </div>
            <div class="carousel-item">
              <img src="{{asset('assets/uploads/cover/cover3.jpg')}}" class="d-block w-100" alt="..." style="height: 90vh; object-fit:cover; object-position: center;">
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
  </section> --}}

    

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            @php ($movie_covers = [])

            @foreach ($movielist as $movie)

                @php (array_push($movie_covers, asset('covers/'.$movie->movie_cover)))
            
            @endforeach

            @php ($random = array_rand($movie_covers, 3))
            
            <div class="carousel-item active">
                <img src="{{ $movie_covers[$random[0]] }}" class="d-block w-100" alt="...">
                <div class="caption">ABCD</div>
            </div>    
            <div class="carousel-item">
                <img src="{{ $movie_covers[$random[1]] }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ $movie_covers[$random[2]] }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    

@endsection 

<script>
    setTimeout(function(){
        $('.alert').slideUp(1500);
    }, 2000);
</script>

