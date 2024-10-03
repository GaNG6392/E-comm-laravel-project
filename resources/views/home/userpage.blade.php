<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    @include('home.css')
</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->

        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>

    <!-- why section -->
    @include('home.why')
    <!-- end why section -->

    <!-- arrival section -->
    @include('home.arrival')
    <!-- end arrival section -->

    <!-- product section -->
    @include('home.product')
    <!-- end product section -->




    <div style="margin-bottom: 10px">
        <h1 style="font-size: 30px; text-align:center; padding:20px 0px">Comments</h1>
        <center>
            <form action="{{url('add_comment')}}" method="POST">
                @csrf
                <textarea name="comment" style="height:150px; width:600px" placeholder="Comment something here"></textarea>
                <br>
                <input class="btn btn-primary" type="submit" value="Comment"></input>
            </form>
        </center>
    </div>

    <div style="padding-left: 20%;">
        <h1 style="padding-bottom: 20px; font-size:20px">All Comments</h1>
        @foreach($comment as $comment)
        <div style="padding-bottom: 10px;">
            <b>{{$comment->name}}</b>
            <p>{{$comment->comment}}</p>
            <a href="javascript::void(0);" style="color:blue" onclick="reply(this)" commentId="{{$comment->id}}">Reply</a>
            @foreach($reply as $rep)
            <div style="padding-left: 3%; padding-bottom: 10px; ">
                <b>{{$rep->name}}</b>
                <p>{{$rep->reply}}</p>
            </div>
            @endforeach
        </div>
        @endforeach

        <form action="{{url('add_reply')}}" method="POST">
            @csrf
            <div style="display: none;" class="replyDiv">
                <input type="text" id="commentId" name="commentId" hidden="">
                <textarea name="reply" id="" style="height: 100px; width:500px" placeholder="Write something here"></textarea>
                <br>
                <button type="submit" value="Reply" class="btn btn-warning">Rep</button>
                <button type="submit" class="btn btn-warning">Reply</button>
                <a href="javascript::void(0);" class="btn " onclick="reply_close(this)">Close</a>
            </div>

        </form>





    </div>

    <script type="text/javascript">
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('commentId')
            $('.replyDiv').insertAfter(caller);
            $('.replyDiv').show();
        };

        function reply_close(caller) {
            $('.replyDiv').hide();
        };
    </script>
    <!-- subscribe section -->
    @include('home.subscribe')
    <!-- end subscribe section -->

    <!-- client section -->
    @include('home.client')
    <!-- end client section -->

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->

    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
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