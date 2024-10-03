<!DOCTYPE html>
<html>

<head>

    <!-- Basic -->

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->

    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    <!-- font awesome style -->
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>

    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

    <!-- <div style="margin: auto; text-align:center">
            <h1 style="background-color: skyblue; padding:30px">Product Detail</h1>
            <img src="/product/{{$product->images}}" alt="">
    <span>
        <h1> Product Title :{{$product->title}}</h1>
        <h1>Product Price : {{$product->price}}</h1>
        <h1> Product Catagory :{{$product->catagory}}</h1>
        <h1> Product Quantity :{{$product->quntity}}</h1>
        <h1>Product Discription :{{$product->discription}}</h1>
    </span>
    </div> -->



    <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%">
        <div class="box">
            <div class="img-box">
                <img style="width: 200px;" src="/product/{{$product->images}}" alt="">
            </div>
            <div class="detail-box">
                <h5>
                    Product Title :{{$product->title}}
                </h5>

                @if($product->discount_price!== null)

                <h6 style="color:red">
                    Discount Price :

                    ${{$product->discount_price}}
                </h6>

                <h6 style="text-decoration:line-through; color:blue">
                    Price :

                    ${{$product->price}}
                </h6>

                @else
                <h6 style="color:blue">
                    ${{$product->price}}
                </h6>
                @endif
                <h1> Product Catagory :{{$product->catagory}}</h1>
                <h1> Product Quantity :1</h1>
                <h1>Product Discription :{{$product->discription}}</h1>

                <form action="{{url('add_card',$product->id)}}" method="Post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="number" name="quantity" min="1" value="1" style="width: 50px;">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Add to Card">
                        </div>

                    </div>
                </form>


            </div>


        </div>
    </div>




    @include('home.footer')
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>