<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{!Request::is('cms/dashboard/') ?: 'active'}}" href="{{url('cms/dashboard')}}">
                    <span data-feather="home"></span>
                    Dashboard
                    <x-heroicon-o-clipboard-list class="x-icon" />
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{!Request::is('cms/menu*') ?: 'active'}}" href="{{url('cms/menu')}}">
                    <span data-feather="home"></span>
                    Menu
                    <x-heroicon-o-menu-alt-1 class="x-icon" />
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{!Request::is('cms/content*') ?: 'active'}}" href="{{url('cms/content')}}">
                    <span data-feather="home"></span>
                    Content
                    <x-heroicon-s-database class="x-icon" />
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{!Request::is('cms/categories*') ?: 'active'}}" href="{{url('cms/categories')}}">
                    <span data-feather="home"></span>
                    Categories
                    <x-heroicon-o-document-duplicate class="x-icon" />
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{!Request::is('cms/products*') ?: 'active'}}" href="{{url('cms/products')}}">
                    <span data-feather="home"></span>
                    Products
                    <x-heroicon-s-shopping-bag class="x-icon" />
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{!Request::is('cms/orders*') ?: 'active'}}" href="{{url('cms/orders')}}">
                    <span data-feather="home"></span>
                    Orders
                    <x-heroicon-o-paper-airplane class="x-icon" />
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{!Request::is('cms/users*') ?: 'active'}}" href="{{url('cms/users')}}">
                    <span data-feather="home"></span>
                    Users
                    <x-heroicon-o-user-group class="x-icon" />
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('')}}">
                    <span data-feather="home"></span>
                    <hr>
                    Back To Site
                    <x-heroicon-o-backspace class="x-icon" />
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
