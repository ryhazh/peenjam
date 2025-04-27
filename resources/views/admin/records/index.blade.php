<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($records as $record)
        <p>User: {{$record->user->name}}</p>
        <p>Item: {{$record->item->name}}</p>
        <p>Quantity: {{$record->quantity}}</p>
        <p>Borrowed At: {{$record->borrowed_at}}</p>
        <p>Due Date: {{$record->due_date}}</p>
        <p>Returned At: {{$record->returned_at}}</p>
        <p>Status: {{$record->status}}</p>
    @endforeach
</body>
</html>