@extends('layouts.app')

@section('title', 'Principal Dashboard')

@section('content')
<div class="text-center">
    <h1>Welcome, Principal Type user {{ auth()->user()?->name}}!</h1>
    <p>You are logged in as a Pricipal User Type.</p>
</div>
@endsection
