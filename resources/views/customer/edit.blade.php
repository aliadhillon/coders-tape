@extends('layouts.app')

@section('title', 'Edit Customer')
    
@section('content')
    <h2>Edit Customer: {{ $customer->name }}</h2>
    <form action="{{ route('customers.update', compact('customer')) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Name:</label>
            <br>
            <input class="@error('name') invalid @enderror" type="text" name="name" id="name" size="40" autocomplete="off" value="{{ old('name', $customer->name) }}">
            @error('name')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <br>
            <input class="@error('email') invalid @enderror" type="email" name="email" id="email" size="40" autocomplete="off" value="{{ old('email', $customer->email) }}">
            @error('email')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button class="button" type="submit">Update Customer</button>
        </div>
    </form>
@endsection
