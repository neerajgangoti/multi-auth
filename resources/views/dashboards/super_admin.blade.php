@extends('layouts.app')

@section('title', 'Super Admin Dashboard')

@section('content')
<div class="text-center">
    <h1>Welcome, Super Admin! {{ auth()->user()?->name}}</h1>
    <p>You are logged in as a Super Admin.</p>
</div>
@endsection
