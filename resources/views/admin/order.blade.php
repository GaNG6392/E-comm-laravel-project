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

        th {
            background-color: skyblue;
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
                    <h2 class="h2_font">Our Order</h2>

                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input style="color: black;" type="text" name="search" placeholder="Search for something">
                        <input type="submit" value="Search" class="btn btn-outline-primary p-2">
                    </form>
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
                            <th>Delevared</th>
                            <th>Print PDF</th>
                            <th>Send Email</th>
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
                            <td><img src="/product/{{$data->image}}" alt=""></td>
                            <td>
                                {{$data->payment_status}}
                            </td>
                            <td>
                                {{$data->delevary_status}}
                            </td>
                            <td>
                                @if($data->delevary_status == 'processing')
                                <a href="{{url('delevary',$data->id)}}"><button class="btn btn-primary">Delevered</button></a>
                                @else
                                <p style="color: green;">Delevared</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('print_pdf',$data->id)}}">
                                    <button class="btn btn-secondary">Print PDF</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{url('send_email',$data->id)}}">
                                    <button class="btn btn-info">Send Email</button>
                                </a>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="16"> Data Not found</td>
                        </tr>
                        @endforelse
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