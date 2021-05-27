@extends('master')
@section('main_content')
<div class="container">
    <div class="single-product-area mb-80">
        <div class="row">
            <!-- imgs-zoom-area start -->
            <div class="col-lg-5">
                <div class="imgs-zoom-area">
                    <img id="zoom_03" src="{{asset('storage/images/' . $product['pimage'])}}"
                        data-zoom-image="img/product/6.jpg" alt="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="gallery_01"
                                class="carousel-btn slick-arrow-3 mt-30 slick-initialized slick-slider">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- imgs-zoom-area end -->
            <!-- single-product-info start -->
            <div class="col-lg-4">
                <div class="single-product-info">
                    <h3 class="text-black-1">{{$product['ptitle']}} </h3>
                    <!--  hr -->
                    <hr>
                    <!-- single-pro-color-rating -->
                    <!-- plus-minus-pro-action -->
                    @if($product['quantity'])
                    <div class="plus-minus-pro-action clearfix">
                        <div class="sin-plus-minus f-left clearfix">
                            <p class="color-title f-left">Qty</p>
                            <div class="cart-plus-minus f-left">
                                <div style="cursor: pointer; user-select: none" class="dec qtybutton">-</div>
                                <input type="text" value="1" name="qtybutton" readonly
                                    class="cart-plus-minus-box product-p" max="{{$product['quantity']}}">
                                <div style="cursor: pointer; user-select: none" class="inc qtybutton">+</div>
                            </div>
                        </div>
                    </div>
                    <p>({{$product['quantity']}} in stock)</p>
                    @else
                    <div class="plus-minus-pro-action clearfix">
                        <p>Out Of Stock</p>
                    </div>
                    @endif
                    <!-- plus-minus-pro-action end -->
                    <!-- hr -->
                    <hr>
                    <!-- single-product-price -->
                    <h3 class="pro-price">Price: ${{$product['price']}}</h3>
                    <!--  hr -->
                    <hr>
                    <div>
                        @inject('wishlist_obj', 'App\Models\Wishlist')
                        @if(Session::get('user_id'))
                        @if($wishlist_obj->find_one($product['id']))
                        <a class="button button-white extra-small" style="cursor: default" tabindex="-1">
                            <span class="text-uppercase">In wish list</span>
                        </a>
                        @else
                        <a data-pid="{{$product['id']}}" class="button add-to-wishlist extra-small button-black"
                            tabindex="-1">
                            <span class="text-uppercase">Add to wishlist</span>
                        </a>
                        @endif
                        @endif
                        @if(Cart::get($product['id']))
                        <a style="cursor:default" class="button extra-small button-white"><span
                                class="text-uppercase">Already In
                                Cart...</span></a>
                        @else
                        <a href="#" class="button extra-small" tabindex="-1">
                            <span data-pid={{$product['id']}} class="text-uppercase add-to-cart-btn">Add To Cart</span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                @include('category_sidebar')
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <hr>
                <div class="single-product-tab reviews-tab">
                    <ul class="nav mb-20">
                        <li><a class="active" href="#description" data-toggle="tab">description</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active show" id="description">
                            <p>{!!$product['particle']!!}</p>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>
@endsection
