@extends('layouts.app')

@section('title', 'Edit Customer')
    
@section('content')
    <h2>Edit Customer: {{ $customer->name }}</h2>
    <form action="{{ route('customers.update', compact('customer')) }}" method="post" enctype="multipart/form-data">

        @method('PATCH')

        @include('partials.form')

        <div class="form-group">
            <button class="button" type="submit">Update Customer</button>
        </div>
    </form>
@endsection
