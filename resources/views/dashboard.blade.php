@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')
    <h5 class="mb-3">Welcome back, {{ Auth::user()->name }}!</h5>
@endsection
