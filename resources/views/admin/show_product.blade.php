<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <base href="/public">

    <style>
        .h2_font {
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
            padding-bottom: 30px;
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

        .th_color {
            background-color: skyblue;
            padding: 20px;
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

                <div class="div_center">
                    <h2 class="h2_font">Show Product</h2>
                    <table class="center">
                        <tr class="th_color">
                            <th>Product Name</th>
                            <th>Discription</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Catagory</th>
                            <th>Image</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->title}}</td>
                            <td>{{$data->discription}}</td>
                            <td>{{$data->quntity}}</td>
                            <td>{{$data->price}}</td>
                            <td>{{$data->catagory}}</td>
                            <td><img src="/product/{{$data->images}}" alt=""></td>
                            <td>
                                <a onclick="return confirm('Are You Sure To Delete This..')" class="btn btn-danger" href="{{url('delete_product',$data->id)}}">Delete </a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{url('/edit_product',$data->id)}}">Edit </a>
                            </td>
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