@extends('layouts.app')

@section('title', "Coder's Tape")

@section('content')
    <h2>Welcome to our website</h2>
    <p>
        <a href="{{ url('/customers', [1]) }}">1st</a>        
    </p>
@endsection
