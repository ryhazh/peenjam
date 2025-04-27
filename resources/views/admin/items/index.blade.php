<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($items as $item)
        <p>{{$item->name}}</p>
        <p>{{$item->category->name}}</p>
        <p>{{$item->description}}</p>
        <p>{{$item->quantity}}</p>
    @endforeach
</body>
</html>