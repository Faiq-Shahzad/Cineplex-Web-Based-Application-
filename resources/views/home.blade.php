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
</style>


@section('content')

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

@endsection 

<script>
    setTimeout(function(){
        $('.alert').slideUp(1500);
    }, 2000);
</script>

