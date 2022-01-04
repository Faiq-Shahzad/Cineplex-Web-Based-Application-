@extends('layouts.layout')

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

    <div class="jumbotron text-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

@endsection

<script>
    setTimeout(function(){
        $('.alert').slideUp(1500);
    }, 2000);
</script>