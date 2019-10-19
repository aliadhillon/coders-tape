@extends('layouts.app')

@section('title', 'Crate Customer')

@section('content')
    <h2>Create New Customer</h2>
    <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
        
        @include('partials.form')

        <div class="form-group">
            <button class="button" type="submit">Add New Customer</button>
             <a class="link-button" href="{{ route('customers.index') }}">Cancel</a>
        </div>
    </form>
@endsection
