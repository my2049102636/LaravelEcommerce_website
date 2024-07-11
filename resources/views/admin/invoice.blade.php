<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>customer name:{{$order->name}}</h2>
    <h2>customer address:{{$order->rec_address}}</h2>
    <h2>customer phone:{{$order->phone}}</h2>
    <h2>product name:{{$order->product->title}}</h2>
    <h2>product price:{{$order->product->price}}</h2>
    <h2>
        <img width="200px" src="images/{{$order->product->image}}" alt="">
    </h2>
    <h2>product status:{{$order->status}}</h2>

</body>
</html>