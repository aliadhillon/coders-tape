@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <h2>Services</h2>
    <hr>
    <form action="{{ route('services.store') }}" method="post">
        <h3>Create new Service</h3>
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <br>
            <input class="@error('name') invalid @enderror" type="text" name="name" id="name" autocomplete="off" value="{{ old('name') }}">
            @error('name')
                <span class="text-red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit">Save</button>
        </div>
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
