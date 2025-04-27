@extends('layouts.admin')
@section('content')
    <div>
        @foreach ($items as $item)
            <p>{{$item->name}}</p>
            <p>{{$item->category->name}}</p>
            <p>{{$item->description}}</p>
            <p>{{$item->quantity}}</p>
        @endforeach
    </div>
@endsection
