@extends('master')
@section('main_content')
<div class="container">
    @if(!Cart::isEmpty())
    <div class="row">
        <div class="col-12">
            <div class="table-content table-responsive mb-50">
                <table class="text-center">
                    <thead>
                        <tr>
                            <th class="product-thumbnail">product</th>
                            <th class="product-price">price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-subtotal">subtotal</th>
                            <th class="product-remove">remove</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cart as $product)
                        <tr>
                            <td class="product-thumbnail">
                                <div class="pro-thumbnail-img">
                                    <img style="border-radius: 10px !important;"
                                        src="{{asset('storage/images/' . $product['attributes']['image'])}}" alt="">
                                </div>
                                <div class="pro-thumbnail-info text-left">
                                    <h6 class="product-title-2">
                                        <a
                                            href="{{url('shop/product/' . $product['attributes']['url'])}}">{{$product['name']}}</a>
                                    </h6>
                                </div>
                            </td>
                            <td class="product-price">${{$product['price']}}</td>
                            <td class="product-quantity">
                                <div class="">
                                    <button class="btn btn-secondary btn-qty" data-pid={{$product['id']}} data-op="mn"
                                        style="display: inline; font-size: 2rem; box-shadow: none">-</button>
                                    <span class="cart-plus-minus-box mx-2">{{$product['quantity']}}</span>
                                    <button class="btn btn-secondary btn-qty" data-pid={{$product['id']}} data-op="ad"
                                        style="display: inline; font-size: 2rem; box-shadow: none">+</button>
                                </div>
                            </td>
                            <td class="product-subtotal">${{$product['quantity'] * $product['price']}}</td>
                            <td class="product-remove">
                                <a onclick="return confirm('Remove Item?')"
                                    href="{{url('/shop/remove-item/' . $product['id'])}}" class="mx-auto"><i
                                        class="zmdi zmdi-close"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="payment-details box-shadow p-30 mb-50">
                <h6 class="widget-title border-left mb-20">payment details</h6>
                <table>
                    <tbody>
                        <tr>
                            <td class="order-total">Order Total</td>
                            <td class="order-total-price">${{Cart::getTotal()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row float-right">
        <div class="d-flex">
            <button class="mr-20 pt-2 btn-clear-cart" style="cursor: pointer">Clear Cart </button>
            <a class="submit-btn-1 black-bg btn-hover-2 pt-2" href="{{url('shop/order-now')}}"
                style="color: white; cursor: pointer" type="submit">Check
                Out</a>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title  text-center mb-40">
                <h2 class="uppercase mb-30">Your Cart Is Empty</h2>
                <h6 class="mb-40">Start adding items to your cart!</h6>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
