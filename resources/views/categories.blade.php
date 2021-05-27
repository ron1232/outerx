@extends('master')
@section('main_content')
@include('breadcrumbs', ['title' => 'Shop Categories', 'image' => 'categories.jpg'])
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>OuterX Shop Categories</h1>
            <p>Check our categories and choose your products</p>
        </div>
    </div>
    <div class="row mt-5">
        @if($categories)
        @foreach($categories as $category)
        <div class="col-lg-6 col-xl-4">
            <div class="product-item ml-2">
                <a href="{{'shop/'.$category['curl']}}">
                    <div class="card-img"
                        style="background-image:url({{asset('storage/images/' . $category['cimage'])}})">
                    </div>
                </a>
                <div class="product-info">
                    <h6 class="product-title">
                        <a href="{{'shop/'.$category['curl']}}">{{$category['ctitle']}}</a>
                    </h6>
                    <div class="pro-rating">
                        <p style="font-weight: bold">{{$category['cshort']}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col">
            <p><i>No categories avaliable...</i></p>
        </div>
        @endif
    </div>
</div>

@endsection
