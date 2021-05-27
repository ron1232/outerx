<header class="header-area header-wrapper">
    <div class="header-top-bar plr-185">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 d-md-block">
                    <div class="call-us">
                        <p class="mb-0 roboto">Enjoy shopping!</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="top-link clearfix">
                        <ul class="link f-right">
                            @if(!Session::has('user_id'))
                            <li>
                                <a href="{{url('user/signin')}}">
                                    <i class="zmdi zmdi-lock"></i>
                                    Login
                                </a>
                            </li>
                            @else
                            @inject('wishlist_obj', 'App\Models\Wishlist')
                            <li>
                                <a href="{{url('user/wishlist')}}">
                                    <i class="zmdi zmdi-favorite"></i>
                                    Wish List ({{$wishlist_obj->getTotal()}})
                                </a>
                            </li>
                            <li>
                                <a href="{{url('user/profile')}}">
                                    <i class="zmdi zmdi-account"></i>
                                    My Account
                                </a>
                            </li>
                            <li>
                                <a href="{{url('user/logout')}}">
                                    <i class="zmdi zmdi-lock"></i>
                                    Logout
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="header-middle-area plr-185">
        <div class="container-fluid">
            <div class="full-width-mega-dropdown">
                <div class="row">
                    <div class="col-lg-2 col-md-4">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <h1 class="pb-1"><span style="font-size: 2.65rem">OuterX</span>
                                    <x-heroicon-o-chip style="width: 2.65rem; margin-bottom: 0.5rem;" />
                                </h1>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <nav id="primary-menu">
                            <ul class="main-menu text-center">
                                <li>
                                    <a href="{{url('')}}">Home
                                        <x-heroicon-o-home class="x-icon mb-2" />
                                    </a>
                                </li>
                                <li class="mega-parent">
                                    <a href="{{url('shop')}}">Shop
                                        <x-heroicon-o-shopping-cart class="x-icon mb-1" />
                                    </a>
                                </li>
                                @if(!Session::has('user_id'))
                                <li>
                                    <a href="{{url('user/signup')}}">Register
                                        <x-heroicon-o-clipboard-check class="x-icon mb-1" />
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('user/signin')}}">Sign In
                                        <x-heroicon-o-login class="x-icon mb-1" />
                                    </a>
                                </li>
                                @else
                                @if(Session::has('user_image'))
                                <li>
                                    <a href="{{url('user/profile')}}">{{Session::get('user_name')}}
                                        <img class="profile-pic"
                                            src="{{asset('storage/images/' . Session::get('user_image') )}}" alt=""></a>
                                </li>
                                @else
                                <li>
                                    <a href="{{url('user/profile')}}">{{Session::get('user_name')}}
                                        <x-heroicon-o-dots-circle-horizontal class="x-icon mb-1" /></a>
                                </li>
                                @endif
                                @if(Session::has('is_admin'))
                                <li>
                                    <a href="{{url('cms/dashboard')}}">Admin Panel
                                        <x-heroicon-s-pencil-alt class="x-icon mb-1" />
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{url('user/logout')}}">Logout
                                        <x-heroicon-o-logout class="x-icon mb-1" />
                                    </a>
                                </li>
                                @endif
                                @if(!empty($menu))
                                <li class="nav-item dropdown mega-parent">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        More
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach($menu as $menu_item)
                                        <div>
                                            <a style="dropdown-item"
                                                href="{{url($menu_item['url'])}}">{{$menu_item['link']}}</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-8">
                        <div class="search-top-cart  f-right">
                            <div class="header-search f-left">
                                <div class="header-search-inner">
                                    <button class="search-toggle">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <div class="top-search-box">
                                        <input type="text" placeholder="Search here your product...">
                                        <div class="search-output d-none p-3 border text-dark w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="total-cart f-left">
                                <div class="total-cart-in">
                                    <div class="cart-toggler">
                                        <a href="{{url('shop/cart')}}">
                                            <span
                                                class="cart-quantity">{{Cart::isEmpty() ? '' : Cart::getTotalQuantity() }}</span><br>
                                            <span class="cart-icon">
                                                <i class="zmdi zmdi-shopping-cart-plus"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
