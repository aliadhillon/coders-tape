@extends('layouts.app')

@section('content')
    <h1>Log</h1>
    @if ($log)
        <ul>
            @while (!$log->eof())
                <li>{{ $log->fgets() }}</li>
            @endwhile
        </ul>
    @else
        <p>No logs yet.</p>
    @endif
@endsection
