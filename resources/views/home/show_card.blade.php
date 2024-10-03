<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
            padding: 15px;
            /* background-color: lightgreen; */
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            color: black;
            border-collapse: collapse;
            font-family: arial, sans-serif;
            background-color: white;
            box-shadow: 1px 1px 50px 1px pink;

        }

        .main {
            background-color: lightgrey;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        .th_color {
            background-color: skyblue;
            padding: 40px;
        }

        tr:nth-child(even) {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <div class="main-panel">
            <div class="content-wrapper">

                <div class="div_center">
                    <div class="main">
                        <h2 class="h2_font">Show Card</h2>
                        <table class="center">
                            <tr class="th_color">
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                            <?php $total_price = 0 ?>


                            @foreach($card as $card)
                            <tr>
                                <td>{{$card->product_title}}</td>
                                <td>{{$card->price}}</td>
                                <td>{{$card->quantity}}</td>
                                <td><img style="height: 50px; width:50px;" src="/product/{{$card->image}}" alt=""></td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure delete this ....')" href="{{url('delete_card_product',$card->id)}}">Remove Product</a>
                                </td>
                            </tr>
                            <?php $total_price = $total_price + $card->price ?>
                            @endforeach
                        </table>
                        <div class="h2_font">
                            <h1>
                                Total Price :{{$total_price}}
                            </h1>
                        </div>

                    </div>
                    <div style="text-align: center;padding-bottom:15px">
                        <h1 style="font-size: 25px; padding-bottom:15px">
                            Proceed to Order
                        </h1>
                        <a class="btn btn-danger" href="{{url('cash_delevary')}}">Cash On Delevary</a>
                        <a class="btn btn-danger" href=""> Pay Using Card</a>
                    </div>
                </div>
            </div>
        </div>



        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <script>
            function confirmation(ev) {
                ev.preventDefault();
                var urlToDirect = ev.currentTarget.getAttribute('href');
                console.log(urlToDirect);
                swal({
                        title: "Are you sure cancel this product",
                        text: "You will not be able to revert this..",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true
                    })
                    .then((willCancel) => {
                        if (wwillCancel) {
                            window.location.href = urlToRedirect
                        }
                    })
            }
        </script>



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