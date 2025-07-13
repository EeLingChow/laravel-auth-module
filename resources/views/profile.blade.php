@extends('layouts.layout')

@section('title', 'My Profile')

@section('content')
    <div class="col-md-6 col-lg-6 m-auto">
        <div class="card shadow">
            <div class="card-header">My Profile</div>
            <div class="card-body">

                @include('partials.alert')

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf

                    <x-form label="Name" name="name" value="{{ old('name', Auth::user()->name) }}" />

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                    </div>

                    <x-button>Update</x-button>
                </form>

            </div>
        </div>
    </div>
@endsection
