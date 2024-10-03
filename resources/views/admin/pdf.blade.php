<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .maincontainer {
            width: 50%;
            border-radius: 15px;
            box-shadow: 0px 0px 50px 1px lightgray;
            padding: 10px;
            margin: auto;
        }

        .container {
            display: flex;
            justify-content: space-around;
        }
    </style>
</head>

<body>

    <div class="maincontainer">
        <h1 style="text-align: center;">Our Products</h1>
        <hr>
        <div class="container">
            <div class="userdata">
                <h5>Name :{{$order->name}} </h5>
                <h5>Email :{{$order->email}} </h5>
                <h5>Phone :{{$order->phone}} </h5>
                <h5>Address :{{$order->address}} </h5>
            </div>
            <div class="productdata">
                <h5>Item -</h5>
                <h5>{{$order->product_title}} : {{$order->price}} </h5>
                <h3>Total Rs__ :{{$order->price}}/-</h3>
            </div>
        </div>
    </div>
</body>

</html>