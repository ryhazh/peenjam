@extends('layouts.admin')
@section('content')
    <div>
        @foreach ($users as $user)
            <p>{{$user->name}}</p>
            <p>{{$user->phone}}</p>
            <p>{{$user->email}}</p>
            <p>{{$user->password}}</p>
        @endforeach
    </div>
@endsection
