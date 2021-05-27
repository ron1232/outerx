@extends('master')
@section('main_content')
@include('breadcrumbs', ['title' => 'WishList', 'image' => 'wishlist.png'])
<section id="page-content" class="page-wrapper section">
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="wishlist">
                            <div class="wishlist-content">
                                <form action="#">
                                    <div class="table-content table-responsive mb-50">
                                        <table class="text-center">
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">product</th>
                                                    <th class="product-price">price</th>
                                                    <th class="product-add-cart">add to cart</th>
                                                    <th class="product-remove">remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($wishlist as $item)
                                                <!-- tr -->
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <div class="pro-thumbnail-info text-left">
                                                            <h6 class="product-title-2">
                                                                <a
                                                                    href="{{url("shop/product/$item->purl")}}">{{$item->ptitle}}</a>
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">{{$item->price}}</td>
                                                    <td class="product-add-cart">
                                                        <a style="cursor: pointer" data-pid="{{$item->id}}" title="Add to cart" class="add-to-cart-btn remove-from-wishlist">
                                                            <i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a style="cursor: pointer" class="mx-auto remove-from-wishlist" data-pid={{$item->id}}><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                                <!-- tr -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->

</section>
@endsection
