<section id="page-content" class="page-wrapper section">

    <!-- FEATURED PRODUCT SECTION START -->
    <div class="featured-product-section section-bg-tb pt-80 pb-55">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">Featured products</h2>
                        <h6 class="mt-2">Have a look:</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4">
                    <div class="product-item">
                        <div class="product-img">
                            <a href="{{url('shop/product/' . $product->purl)}}">
                                <div class="card-img"
                                    style="background-image:url({{asset('storage/images/' . $product->pimage)}})">
                                </div>
                            </a>
                        </div>
                        <div class="product-info">
                            <h6 class="product-title">
                                <a href="{{url('shop/product/' . $product->purl)}}">{{$product->ptitle}}</a>
                            </h6>
                            <h3 class="pro-price">${{$product->price}}</h3>
                            <ul class="action-button">
                                @inject('wishlist_obj', 'App\Models\Wishlist')
                                @if(Session::get('user_id'))
                                @if($wishlist_obj->find_one($product['id']))
                                <li>
                                    <a title="Wishlist">In Wishlist</a>
                                </li>
                                @else
                                <li>
                                    <a tabindex="-1" class="add-to-wishlist" style="cursor: pointer"
                                        data-pid="{{$product['id']}}" title="Wishlist"><i
                                            class="zmdi zmdi-favorite"></i></a>
                                </li>
                                @endif
                                @endif
                                <li>
                                    <a href="{{asset('shop/product/' . $product->purl)}}" title="Quickview"><i
                                            class="zmdi zmdi-zoom-in"></i></a>
                                </li>
                                @if(Cart::get($product->id))
                                <li>
                                    <span class="text-uppercase">In Cart</span>
                                </li>
                                @else
                                @if($product->quantity)
                                <li>
                                    <button data-pid="{{$product->id}}" title="Add to cart" class="add-to-cart-btn">
                                        <i class="zmdi zmdi-shopping-cart-plus"></i></button>
                                </li>
                                @else
                                <li>
                                    <p>Out Of Stock</p>
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
</section>
