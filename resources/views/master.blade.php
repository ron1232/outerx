<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$page_title ?? ''}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('favicon.png')}}">
    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{asset('lib/css/bootstrap.min.css')}}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{asset('lib/lib/css/nivo-slider.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{asset('lib/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{asset('lib/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{asset('lib/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('lib/css/responsive.css')}}">
    <!-- User style -->
    <link rel="stylesheet" href="{{asset('lib/css/custom.css')}}">

    <link rel="stylesheet" href="{{asset('css/card.css')}}" />
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <!-- Modernizr JS -->
    <script src="{{asset('lib/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    <script>
        var BASE_URL = "{{url('')}}";
    </script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Body main wrapper start -->
    <div class="wrapper">

        @include('navbar')

        @include('mobile')

        <main style="min-height: 100vh">
            @yield('main_content')
        </main>


        @include('footer')
    </div>
    <!-- Body main wrapper end -->


    <!-- Placed JS at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{asset('lib/js/vendor/jquery-3.1.1.min.js')}}"></script>
    <!-- Popper js js -->
    <script src="{{asset('lib/js/popper.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{asset('lib/js/bootstrap.min.js')}}"></script>
    <!-- jquery.nivo.slider js -->
    <script src="{{asset('lib/lib/js/jquery.nivo.slider.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('lib/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('lib/js/main.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    @if(Session::has('sm'))
    <script>
        toastr.options.closeButton = true;
        toastr.options.onclick = function() { window.location = BASE_URL + '/shop/cart' }
        toastr.success("&#128722; <- Click to get to cart","{{Session::get('sm')}}");
    </script>
    @endif
    @if(Session::has('rm'))
    <script>
        toastr.success("{{Session::get('rm')}} &#128465;");
    </script>
    @endif
    @if(Session::has('user'))
    <script>
        toastr.success("{{Session::get('user')}} &#128100;");
    </script>
    @endif
    @if(Session::has('order'))
    <script>
        toastr.success("{{Session::get('order')}} &#128077;")
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        toastr.success("{{Session::get('error')}} &#10060;")
    </script>
    @endif
    @if(Session::has('wishlist'))
    <script>
        toastr.success("{{Session::get('wishlist')}}")
    </script>
    @endif
</body>

</html>
