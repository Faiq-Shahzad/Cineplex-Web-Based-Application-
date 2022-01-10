@extends('layouts.adminlayout')

<head>
    <title>Admin - Movies Reviews</title>
</head>

<style>

    @media(max-width: 1600px){

        .alert{
            width: 25%;
            margin-left: auto;
            margin-right: auto;
            margin-top: 2%;
            text-align: center;
            border: 2px solid green !important;
        }


        td a{
            color: white;
        }

        td a:hover{
            color: red;
        }

        th{
            background-color: rgb(219, 25, 51) !important; 
        }

        img{
            max-width: 100px;
            max-height: 100px;
        }

        h1{
            margin-top: 2% !important;
            color: white;
            border-bottom: 1px solid white;
            font-weight: bold !important;
        }

        hr{
            color: white !important;
            margin-top: 0 !important;
            padding: 0 !important;
        }

        td{
            text-align: center;
        }

        /* #phn_table{
            display: none;
        } */
    }

    @media(max-width: 450px){
        /* #pc_table{
            display: none;
        }

        #phn_table{
            display: block;
        } */
    }

</style>

@section('content')

    <h1>Movies - Reviews</h1>
    <hr>

    <table class="table table-striped table-hover table-dark" id="pc_table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">User ID</th>
            <th scope="col">Movie Name</th>
            <th scope="col">Review</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user_id }}</td>
                    @foreach ($movie as $m)
                        @if ($review->movie_id === $m->id)
                            <td>{{ $m->movie_name }}</td>
                        @endif    
                    @endforeach
                    
                    <td>{{ $review->movie_review }}</td>
            @endforeach
        </tbody>
    </table>
@endsection