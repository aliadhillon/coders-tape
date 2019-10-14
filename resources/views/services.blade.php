@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <h2>Services</h2>
    <h3>We provide following services</h3>
    <ul>
        @forelse ($services as $service)
            <li>{{ $service->name }}</li>
        @empty
            <p>No services yet.</p>
        @endforelse
    </ul>
@endsection
