@extends('layouts.layout')

@section('title', 'Forgot Password')

@section('content')
    <div class="col-md-6 col-lg-6 m-auto">
        <div class="card shadow">
            <div class="card-header">Forgot Password</div>
            <div class="card-body">

                @include('partials.alert')

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <x-form label="Email" name="email" type="email" />

                    <x-button>Send Reset Link</x-button>
                </form>

            </div>
        </div>
    </div>
@endsection
