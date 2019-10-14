@extends('layouts.app')

@section('title', $customer->name)
    
@section('content')
    <h2>Customer</h2>
    <div>
        <a href="/customers">< Back</a>
    </div>
    <div>
        <p>Name: {{ $customer->name }}</p>
        <p>Email: {{ $customer->email }}</p>
    </div>
@endsection
