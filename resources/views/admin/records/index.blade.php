@extends('layouts.admin')
@section('content')
    <div>
        @foreach ($records as $record)
            <p>User: {{$record->user->name}}</p>
            <p>Item: {{$record->item->name}}</p>
            <p>Quantity: {{$record->quantity}}</p>
            <p>Borrowed At: {{$record->borrowed_at}}</p>
            <p>Due Date: {{$record->due_date}}</p>
            <p>Returned At: {{$record->returned_at}}</p>
            <p>Status: {{$record->status}}</p>
            <p>Is Approved: {{$record->is_approved}}</p>
        @endforeach
    </div>
@endsection
