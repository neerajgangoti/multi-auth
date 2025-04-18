@extends('layouts.app')

@section('title', 'Management User Dashboard')

@section('content')
<div class="text-center">
    <h1>Welcome, Management {{ auth()->user()?->name}} !</h1>
    <p>You are logged in as a manager.</p>
</div>
@endsection
