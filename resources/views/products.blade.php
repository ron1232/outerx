@extends('master')
@section('main_content')
@include('breadcrumbs', ['title' => $products[0]->ctitle, 'image' => $products[0]->cimage])
<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{$products[0]->ctitle}}:</h1>
            <small style="font-size: 0.75em">{{$products[0]->carticle}}</small>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-9 order-lg-2 order-1">
            <div class="shop-content">
                <!-- shop-option start -->
                <div class="shop-option box-shadow mb-30 clearfix">
                    <!-- Nav tabs -->
                    <ul class="nav shop-tab f-left" role="tablist">
                        <li>
                            <a class="active" href="#grid-view" data-toggle="tab"><i
                                    class="zmdi zmdi-view-module"></i></a>
                        </li>
                        <li>
                            <a href="#list-view" data-toggle="tab"><i class="zmdi zmdi-view-list-alt"></i></a>
                        </li>
                    </ul>
                    <!-- short-by -->
                    <div class="short-by f-left text-center">
                        <span>Sort by :</span>
                        <select class="price">
                            <option value="">Select</option>
                            <option @if(strtolower(app('request')->input('orderBy')) == 'desc') selected @endif
                                value="-1">Price: High
                                To
                                Low</option>
                            <option @if(strtolower(app('request')->input('orderBy')) == 'asc') selected @endif
                                value="1">Price:
                                Low To
                                High</option>
                        </select>
                    </div>
                    <!-- showing -->
                    <div class="showing f-right text-right">
                        <span>Showing : {{$products->perPage()}} per page, Total: {{$products->total()}}</span>
                    </div>
                </div>
                <!-- shop-option end -->
                <!-- Tab Content start -->
                <div class="tab-content">
                    <!-- grid-view -->
                    <div id="grid-view" class="tab-pane active show" role="tabpanel">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-lg-6 col-xl-4">
                                <div class="product-item">
                                    <a href="{{url('shop/product/' . $product->purl)}}">
                                        <div class="card-img"
                                            style="background-image:url({{asset('storage/images/' . $product->pimage)}})">
                                        </div>
                                    </a>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a
                                                href="{{url('shop/' . $product->curl . '/' . $product->purl)}}">{{$product->ptitle}}</a>
                                        </h6>
                                        <h3 class="pro-price">$ {{$product->price}}</h3>
                                        <ul class="action-button">
                                            @if(Cart::get($product->id))
                                            <li>
                                                <span class="text-uppercase">In Cart</span>
                                            </li>
                                            @else
                                            @if($product->quantity)
                                            <li>
                                                <button data-pid="{{$product->id}}" title="Add to cart"
                                                    class="add-to-cart-btn">
                                                    <i class="zmdi zmdi-shopping-cart-plus"></i></button>
                                            </li>
                                            @else
                                            <li>
                                                <p>Out Of Stock</p>
                                            </li>
                                            @endif
                                            @endif
                                            <li>
                                                <a style="font-weight:500"
                                                    href="{{url('shop/product/' . $product->purl)}}">More
                                                    Details</a>
                                            </li>
                                            @inject('wishlist_obj', 'App\Models\Wishlist')
                                            @if(Session::get('user_id'))
                                            @if($wishlist_obj->find_one($product->id))
                                            <li>
                                                <a title="Wishlist">In Wishlist</a>
                                            </li>
                                            @else
                                            <li>
                                                <a tabindex="-1" class="add-to-wishlist" style="cursor: pointer"
                                                    data-pid="{{$product->id}}" title="Wishlist"><i
                                                        class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            @endif
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Tab Content end -->
                <!-- shop-pagination start -->
                <div class="row">
                    <div class="col">
                        {{$products->links('pagination::theme')}}
                    </div>
                </div>
                <!-- shop-pagination end -->
            </div>
        </div>
        <div class="col-lg-3 order-lg-1 order-2">
            @include('category_sidebar')
        </div>
    </div>
</div>
@endsection
