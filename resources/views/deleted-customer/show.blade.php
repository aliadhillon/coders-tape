@extends('layouts.app')

@section('title', $customer->name)
    
@section('content')
    <h2>Deleted Customer Details</h2>
    <div>
        <a href="{{ url('deleted-customers') }}">< Back</a>
    </div>
    <div>
        @include('partials.success')
        <p>Name: <strong>{{ $customer->name }}</strong></p>
        <p>Email: {{ $customer->email }}</p>
    </div>
    <div class="box">
        <form action="{{ route('deleted-customers.restore', ['id' => $customer->id]) }}" method="post">
            @csrf
            <button class="button" type="submit">Restore</button>
        </form>
    </div>
    <div class="box">
        <form action="{{ route('deleted-customers.force-delete', ['id' => $customer->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="red-button" type="submit" onclick="return confirm('Do you want to delete it Permanetly?');">Delete Permanetly</button>
        </form>
    </div>
@endsection
