<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OuterX | CMS</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/cms.css?v=' . time())}}">
    <link rel="stylesheet" href="{{asset('css/image-picker.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css?v=' . time())}}" rel="stylesheet">
    <script>
        var BASE_URL = "{{url('')}}";
    </script>
</head>

<body>
    @include('cms.cms_topnav')

    <div class="container-fluid">
        <div class="row">
            @include('cms.cms_sidenav')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                @yield('cms_content')
            </main>
        </div>
    </div>
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
    <script src="{{asset('js/image-picker.min.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('lib/js/main.js')}}"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('js/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('js/cms.js?v=' . time())}}"></script>
    @if(Session::has('all'))
    <script>
        toastr.success("{{Session::get('all')}}");
    </script>
    @endif
</body>

</html>
