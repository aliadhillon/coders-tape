@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <h2>Services</h2>
    <hr>
    <form action="{{ route('service.store') }}" method="post">
        <h3>Create new Service</h3>
        @csrf
        <label for="name">Name:</label>
        <br>
        <input type="text" name="name" id="name" autocomplete="off" value="{{ old('name') }}">
        @error('name')
            <span class="text-red">{{ $message }}</span>
        @enderror
        <br>
        <button type="submit">Save</button>
    </form>
    <h3>We provide following services</h3>
    <ul>
        @forelse ($services as $service)
            <li>{{ $service->name }}</li>
        @empty
            <p>No services yet.</p>
        @endforelse
    </ul>
@endsection
