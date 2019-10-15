@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <h2>Soft Deleted Customers</h2>
    <a href="{{ route('customers.index') }}">All Customers</a>
    <p><a class="no-dec" href="{{ route('customers.create') }}">Add new Customer</a></p>
    @include('partials.success')
    <ol>
        @forelse ($customers as $customer)
            <li><a class="item" href="{{ route('deleted-customers.show', ['id' => $customer->id]) }}"><strong>{{ $customer->name }}</strong></a> &nbsp; -> {{ $customer->email }}</li>
        @empty
            <p>No Soft Deleted Customers.</p>
        @endforelse
    </ol>
@endsection
