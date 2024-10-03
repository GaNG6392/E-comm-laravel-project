<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
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
                    <h2 class="h2_font">Add Product</h2>
                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="">Product Title :</label>
                            <input class="input_color" type="text" name="title" placeholder="Write product title">
                        </div>
                        <div class="div_design">
                            <label for="">Product Discription :</label>
                            <input class="input_color" type="text" name="discription" placeholder="Write product discription">
                        </div>
                        <div class="div_design">
                            <label for="">Product quantity :</label>
                            <input class="input_color" type="number" name="quntity" min="0" placeholder="Write product quantity">
                        </div>
                        <div class="div_design">
                            <label for="">Product Price :</label>
                            <input class="input_color" type="text" name="price" placeholder="Write product price">
                        </div>
                        <div class="div_design">
                            <label for="">Product Discount Price :</label>
                            <input class="input_color" type="text" name="discount_price" placeholder="Write product discount price">
                        </div>
                        <div class="div_design">
                            <label for="">Product Catagory :</label>
                            <select class="input_color" name="catagory">
                                <option value="" selected="">Add a catagory here</option>
                                @foreach($catagory as $catagory)
                                <option>{{$catagory->catagory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="">Product Image :</label>
                            <input class="input_color" type="file" name="images">
                        </div>
                        <div class="div_design">
                            <input type="submit" value="Add Product" class="btn btn-primary">
                        </div>
                    </form>
                    <table class="center">
                        <tr>
                            <th>Product Name</th>
                            <th>Discription</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Quantity</th>
                            <th>Catagory</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->title}}</td>
                            <td>{{$data->discription}}</td>
                            <td>{{$data->quntity}}</td>
                            <td>{{$data->price}}</td>
                            <td>{{$data->discount_price}}</td>
                            <td>{{$data->catagory}}</td>
                            <td><img src="/product/{{$data->images}}" alt=""></td>
                            <td><a onclick="return confirm('Are You Sure To Delete This..')" class="btn btn-danger" href="{{url('delete_product',$data->id)}}">Delete </a></td>

                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')

        <!-- End custom js for this page -->
</body>

</html>