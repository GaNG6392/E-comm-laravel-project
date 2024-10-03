<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <div>
                <form action="{{url('search_product')}}" method="GET">
                    @csrf
                    <input style="width: 500px;" type="text" name="search" placeholder="Seach for something">
                    <input type="submit" value="search">
                </form>
            </div>
        </div>
        @if(Session()->has('message'))
        <!-- <script>
            swal("Message", "{{Session::get('message')}}", 'success', {
                button: true,
                button: OK,
                timer:3000
            })
        </script> -->
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message') }};
        </div>
        @endif
        <div class="row">
            @foreach($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('product_detail',$products->id)}}" class="option1">
                                Product Detail
                            </a>
                            <form action="{{url('add_card',$products->id)}}" method="Post">
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
                    <div class="img-box">
                        <img src="product/{{$products->images}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$products->title}}
                        </h5>

                        @if($products->discount_price == null)
                        <h6 style="color:blue">
                            Price
                            <br>
                            ${{$products->price}}
                        </h6>

                        @else

                        <h6 style="color:red">
                            Discount Price
                            <br>
                            ${{$products->discount_price}}
                        </h6>

                        <h6 style="text-decoration:line-through; color:blue">
                            Price
                            <br>
                            ${{$products->price}}
                        </h6>
                        @endif
                    </div>

                </div>
            </div>
            @endforeach()
            <span style="padding-top: 20px; font-size:20px">
                {!! $product->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>
        </div>
    </div>
</section>