@extends('layouts.adminlayout')

<head>
    <title>Admin - Users</title>
</head>

<style>

    @media(max-width: 1600px){
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
    }

    @media(max-width: 767px){
        table{
            font-size: 14px;
        }
    }

</style>

@section('content')

    <h1>Movies - Reviews</h1>
    <hr>
    <br>

    <table class="table table-striped table-hover table-dark" id="pc_table">
        <thead>
        <tr class="text-center">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($userlist as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    @if ($user->user_role == 1)
                        <td>Admin</td>
                    @else
                        <td>User</td>
                    @endif
                    
            @endforeach
        </tbody>
    </table>
@endsection