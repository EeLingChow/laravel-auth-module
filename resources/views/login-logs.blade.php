@extends('layouts.layout')

@section('title', 'Login Logs')

@section('content')
    <h5 class="mb-4">Login Logs</h5>

    @if ($logs->isEmpty())
        <p>No login records found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>IP Address</th>
                    <th>User Agent</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>{{ $log->ip_address }}</td>
                        <td class="small text-muted">{{ $log->user_agent }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-3">
            {{ $logs->links() }}
        </div>
    @endif
@endsection
