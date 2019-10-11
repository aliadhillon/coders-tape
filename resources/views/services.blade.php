@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <h2>Services</h2>
        @isset($services)
        <h3>We provide following services</h3>
            <ul>
                @forelse ($services as $service)
                    <li>{{ $service }}</li>
                @empty
                    <p>No services yet.</p>
                @endforelse
            </ul>
        @endisset
@endsection
