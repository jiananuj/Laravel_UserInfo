@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>User Info!</h1>
    <p>Enter your every information & we will test it. </p>

    
    @if(!Auth::guest())

    <h3> Heya! You are logged in.</h3>
    <p> Go and fill out your information <a class="btn btn-primary btn-lg" href="/home" role="button">Home</a></p>
    
    @else
    <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
    @endif

</div>

    

@endsection