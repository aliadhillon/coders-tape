@extends('layouts.app')

@section('title', 'Crate Customer')

@section('content')
    <h2>Create New Customer</h2>
    <form action="{{ route('customers.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <br>
            <input class="@error('name') invalid @enderror" type="text" name="name" id="name" size="40" autocomplete="off" value="{{ old('name') }}">
            @error('name')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <br>
            <input class="@error('name') invalid @enderror" type="email" name="email" id="email" size="40" autocomplete="off" value="{{ old('email') }}">
            @error('email')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit">Add New Customer</button>
        </div>
    </form>
@endsection
