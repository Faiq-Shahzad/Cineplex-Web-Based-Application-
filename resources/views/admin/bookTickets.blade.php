@extends('layouts.adminlayout')

@section('title') movie - Book Tickets @endsection


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

        h5{
            font-weight: bold !important;
        }

        .details{
            color: white;
            padding: 2%;
            text-align: justify;
            font-size: 18px;
        }

        img{
            width: 100%;
            height: 70%;
            object-fit: cover;
            object-position: top;
            /* box-shadow: inset 0px 0px 20px 10px rgba(0, 0, 0, 0.6); */
        }

        .review{
            margin-left: auto !important;
            margin-right: auto !important;
            width: 50%;
        }

        button{
            margin-top: 2% !important;
            width: 30% !important;
            margin-left: auto !important;
            margin-right: auto !important; 
        }

        table{
            color: white !important;
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
        
        <h5>Select Tickets: </h5>
        
        <form class="review" action="{{ url("/admin/tickets/$movie->id/$user->id") }}" method='POST'>
            @csrf

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Tickets</th>
                    <th scope="col">Cost (PKR)</th>
                    <th scope="col"></th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                    <th scope="col">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td scope="row">E-Standard</td>
                    <td>1000</td>
                    <td id="minus"><i class="fas fa-minus-circle"></i></td>
                    <td><input type="number" name="no_of_seats" min="1" max="10"></td>
                    <td id="plus"><i class="fas fa-plus-circle"></i></td>
                    <td><input type="number" disabled></td>
                </tr>
                <tr>
                    <td scope="row">GST</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>50</td>
                </tr>
                <tr>
                    <th scope="row">Total</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>

            <div class="row">
                <button type="submit" class="btn btn-success">Book Ticket</button> 
            </div>
            
        </form>
    </div>
    
@endsection