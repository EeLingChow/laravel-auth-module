@extends('layouts.layout')

@section('title', 'Change Password')

@section('content')
    <div class="col-md-6 col-lg-6 m-auto">
        <div class="card shadow">
            <div class="card-header">Change Password</div>
            <div class="card-body">

                @include('partials.alert')

                <form method="POST" action="{{ route('profile.update-password') }}">
                    @csrf

                    <x-form label="Current Password" name="current_password" type="password" />
                    <x-form label="New Password" name="new_password" type="password" />
                    <x-form label="Confirm New Password" name="new_password_confirmation" type="password" />

                    <x-button>Change Password</x-button>
                </form>

            </div>
        </div>
    </div>
@endsection
