@extends('layouts.app')

@section('title', $customer->name)
    
@section('content')
    <h2>Customer Details</h2>
    <div>
        <a href="/customers">< Back</a>
    </div>
    <div class="profile">
        @include('partials.success')
        <p>Name: <strong>{{ $customer->name }}</strong></p>
        <p>Email: {{ $customer->email }}</p>
    </div>
    <div class="box">
        <form action="{{ route('customers.destroy', compact('customer')) }}" method="POST">
            @csrf
            @method('DELETE')
            <a class="link-button inline" href="{{ route('customers.edit', compact('customer')) }}">Edit</a>
            <button class="red-button" type="submit" onclick="return confirm('Are sure to delete this one?');">Delete</button>
        </form>
    </div>
    @isset($customer->image)
        <a href="{{ asset('storage/uploads/' . $customer->image) }}"
           title="Click here to see full size image">
           <img src="{{ Storage::disk('uploads')->url('small/' . $customer->image) }}"
            alt="No image">
        </a>
        <br>
        <a href="{{ route('download', ['photo' => $customer->image] ) }}">Download Image</a>
    @endisset
@endsection
