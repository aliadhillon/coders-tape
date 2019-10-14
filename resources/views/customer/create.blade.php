@extends('layouts.app')

@section('title', 'Crate Customer')

@section('content')
    <h2>Create New Customer</h2>
    <form action="" method="post">
        @csrf
        <p>
            <label for="name">Name:</label>
            <br>
            <input type="text" name="name" id="name" size="40" autocomplete="off" value="{{ old('name') }}">
            @error('name')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <label for="email">Email:</label>
            <br>
            <input type="email" name="email" id="email" size="40" autocomplete="off" value="{{ old('email') }}">
            @error('email')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </p>
        <p>
            <button type="submit">Add</button>
        </p>
    </form>
@endsection
