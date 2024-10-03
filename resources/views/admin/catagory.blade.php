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
            color: black;
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

                @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message') }}
                </div>
                @endif
                @if(session()->has('delete'))
                <div class="alert alert-danger">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('delete') }}
                </div>
                @endif
                <div class="div_center">
                    <h2 class="h2_font">
                        Add Catagory
                    </h2>
                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input class="input_color" type="text" name="catagory" placeholder="Write catagory name">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
                    </form>
                    <table class="center">
                        <tr>
                            <th>Catagory Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($catagory as $catagory)
                        <tr>
                            <td>{{$catagory->catagory_name}}</td>
                            <td><a onclick="return confirm('Are You Sure To Delete This..')" class="btn btn-danger" href="{{url('delete_catagory',$catagory->id)}}">Delete </a></td>
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