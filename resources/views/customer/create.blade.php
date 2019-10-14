@extends('layouts.app')

@section('title', 'Crate Customer')

@section('content')
    <h2>Create New Customer</h2>
    <form action="{{ route('customers.store') }}" method="post">
        
        @include('partials.form')
        <div class="form-group">
            <button type="submit">Add New Customer</button>
        </div>
    </form>
@endsection
