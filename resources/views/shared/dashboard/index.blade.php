@extends('layouts.admin')
@section('title', 'Dashboard')

@if (auth()->user()->role->name === 'admin')
    @include('partials.dashboard.admin')
@elseif (auth()->user()->role === 'staff')
    <p>Welcome, Staff! You have limited access.</p>

@else
    <p>Welcome, User!</p>
@endif
