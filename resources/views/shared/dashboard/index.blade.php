@extends('layouts.admin')
@section('title', 'Dashboard')

@if (auth()->user()->role->name === 'admin')
    @include('partials.dashboard.admin')
@elseif (auth()->user()->role === 'staff')

@elseif(auth()->user()->role === 'user')
@endif
