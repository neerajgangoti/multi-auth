@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')
<div class="text-center">
    <h1>Welcome, Teacher! {{ auth()->user()?->name}}</h1>
    <p>You are logged in as a Super Admin.</p>
</div>
@endsection
