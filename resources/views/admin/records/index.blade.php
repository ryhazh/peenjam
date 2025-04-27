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
        <p>{{$record->user_id}}</p>
        <p>{{$record->item_id}}</p>
        <p>{{$record->quantity}}</p>
        <p>{{$record->borrow_date}}</p>
        <p>{{$record->return_date}}</p>
        <p>{{$record->status}}</p>
    @endforeach
</body>
</html>