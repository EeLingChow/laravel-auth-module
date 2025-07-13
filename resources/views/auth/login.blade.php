@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <div class="col-md-6 col-lg-6 m-auto">
        <div class="card shadow">
            <div class="card-header">Login</div>
            <div class="card-body">

                @include('partials.alert')

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <x-form label="Email" name="email" type="email" />
                    <x-form label="Password" name="password" type="password" />

                    <x-button>Login</x-button>

                    <div class="mt-3">
                        <a href="{{ route('password.request') }}" target="_blank">Forgot your password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
