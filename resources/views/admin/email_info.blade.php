<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
            font-size: 15px;
            font-weight: normal;
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
                <div>
                    <h1 style="text-align: center;">
                        Email send successfully: <p>{{$order->email}}</p>
                    </h1>

                    <form action="{{}}" method="POST">
                        @csrf
                        <div style="padding-left: 35%; padding-top: 35px;">
                            <label for="">Email Greeting:</label>
                            <input style="color: black;" type="text" name="greeting">
                        </div>
                        <div style="padding-left: 35%; padding-top: 35px;">
                            <label for="">Email Firstling:</label>
                            <input style="color: black;" type="text" name="firstline">
                        </div>
                        <div style="padding-left: 35%; padding-top: 35px;">
                            <label for="">Email Body:</label>
                            <input style="color: black;" type="text" name="body">
                        </div>
                        <div style="padding-left: 35%; padding-top: 35px;">
                            <label for="">Email Button Name:</label>
                            <input style="color: black;" type="text" name="button">
                        </div>
                        <div style="padding-left: 35%; padding-top: 35px;">
                            <label for="">Email Url:</label>
                            <input style="color: black;" type="text" name="url">
                        </div>
                        <div style="padding-left: 35%; padding-top: 35px;">
                            <label for="">Email Last Line:</label>
                            <input style="color: black;" type="text" name="lastline">
                        </div>
                        <div style="padding-left: 35%; padding-top: 35px;">
                            <input style="color: black;" type="submit" value="Send Email" class="btn btn-primary w-50">
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