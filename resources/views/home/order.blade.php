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
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }


        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            padding-bottom: 20px;
            color: black;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;

        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-bottom: 30px;
            color: black;
            border-collapse: collapse;
            font-family: arial, sans-serif;
            background-color: white;
            padding-bottom: 10px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: skyblue;
        }

        tr:nth-child(even) {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <div class="">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <div class="div_center">
        <h2 class="h2_font">Our Order</h2>

        <!-- <form action="{{url('search')}}" method="get">
            @csrf
            <input style="color: black;" type="text" name="search" placeholder="Search for something">
            <input type="submit" value="Search" class="btn btn-outline-primary p-2">
        </form> -->
        <table class="center">
            <tr class="th_color">
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Payment Status</th>
                <th>Delevary Status</th>

                <th>Action</th>
            </tr>
            @forelse($data as $data)
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->product_title}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{$data->price}}</td>
                <td><img src="/product/{{$data->image}}"></td>
                <td>
                    {{$data->payment_status}}
                </td>
                <td>
                    {{$data->delevary_status}}
                </td>
                <td>
                    @if($data->delevary_status == 'processing')
                    <a onclick="return confirm('Are you sure Cancel this order !!!')" href="{{url('cancel_order',$data->id)}}"><button class="btn btn-danger">Cancel Order</button></a>
                    @else
                    <p style="color: green;">Not Allow</p>
                    @endif
                </td>


            </tr>
            @empty
            <tr>
                <td colspan="16"> Data Not found</td>
            </tr>
            @endforelse
        </table>

    </div>


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