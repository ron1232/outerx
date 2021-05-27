@php
$menu = App\Models\Menu::all()->toArray();
@endphp
@extends('master')
@section('main_content')
<div class="error-section mb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="error-404 box-shadow">
                    <img src="{{asset('storage/images/404.jpg')}}" alt="">
                    <div class="go-to-btn btn-hover-2">
                        <a href="{{url('/')}}">go to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
