<div class="mobile-menu-area d-block d-lg-none section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
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
                            @foreach($menu as $menu_item)
                            <li>
                                <a href="{{url($menu_item['url'])}}">{{$menu_item['link']}}
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
