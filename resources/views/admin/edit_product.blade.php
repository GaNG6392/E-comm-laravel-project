<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">

    @include('admin.css')


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
            margin-top: 30px;
            color: black;
            border-collapse: collapse;
            font-family: arial, sans-serif;
            background-color: white;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->

        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('product'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('product') }}
                </div>
                @endif
                <div class="div_center">
                    <h2 class="h2_font">Update Product</h2>
                    <form action="{{url('/update_product',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="">Product Title :</label>
                            <input class="input_color" type="text" name="title" placeholder="Write product title" value="{{$product->title}}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Discription :</label>
                            <input class="input_color" type="text" name="discription" placeholder="Write product discription" value="{{$product->discription}}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Quantity :</label>
                            <input class="input_color" type="number" name="quntity" placeholder="Write product quantity" value="{{$product->quntity}}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Price :</label>
                            <input class="input_color" type="text" name="price" min="0" placeholder="Write product price" value="{{$product->price}}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Discount Price :</label>
                            <input class="input_color" type="text" name="discount_price" min="0" placeholder="Write discount product price" value="{{$product->discount_price}}">
                        </div>

                        <div class="div_design">
                            <label for="">Product Catagory :</label>
                            <select class="input_color" name="catagory">
                                <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>
                                @foreach($catagory as $catagory)
                                <option>{{$catagory->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="">Current Product Image :</label>
                            <img style="margin: auto;" height="70px" width="100px" src="/product/{{$product->images}}" alt="">
                        </div>
                        <div class="div_design">
                            <label for="">New Product Image :</label>
                            <input class="input_color" type="file" name="images" value="">
                        </div>
                        <div class="div_design">
                            <input type="submit" value="Update Product" class="btn btn-primary">
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')

        <!-- End custom js for this page -->
</body>

</html>