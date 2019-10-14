@extends('layouts.app')

@section('title', $customer->name)
    
@section('content')
    <h2>Customer</h2>
    <div>
        <a href="/customers">< Back</a>
    </div>
    <div>
        @include('partials.success')
        <p>Name: {{ $customer->name }}</p>
        <p>Email: {{ $customer->email }}</p>
    </div>
    <div>
        <a href="{{ route('customers.edit', compact('customer')) }}">Edit</a>
    </div>
@endsection
