@extends('layouts.layout')

@section('title', 'Reset Password')

@section('content')
    <div class="col-md-6 col-lg-6 m-auto">
        <div class="card shadow">
            <div class="card-header">Reset Password</div>
            <div class="card-body">

                @include('partials.alert')

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ request()->get('email') }}">

                    <x-form label="New Password" name="password" type="password" />
                    <x-form label="Confirm Password" name="password_confirmation" type="password" />

                    <x-button>Reset Password</x-button>
                </form>

            </div>
        </div>
    </div>
@endsection
