@extends('layouts.app')

@section('title', 'Other Staff Dashboard')

@section('content')
<div class="text-center">
    <h1>Welcome, Staff member {{ auth()->user()?->name}} !</h1>
    <p>You are logged in as a Staff member.</p>
</div>
@endsection
