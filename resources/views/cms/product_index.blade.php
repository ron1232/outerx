@extends('cms.cms_master')
@section('cms_content')

@include('cms.cms_header', ['title' => 'Products'])
<div class="row">
    <div class="col">
        <a class="btn btn-primary" href="{{url('cms/products/create')}}">Add Product
            <x-heroicon-o-plus-circle style="width: 1.5rem; margin-bottom: 0.2rem" /></a>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Category Name</th>
                    <th>Operations</th>
                    <th>Last Updated At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $item)
                <tr>
                    <td><img src="{{asset('storage/images/' . $item['pimage'])}}"
                            style="width: 60px; border-radius: 5px">
                    </td>
                    <td><a target="_blank" href="{{url('shop/product/' . $item['purl'])}}">{{$item['ptitle']}}</a></td>
                    <td>{{$item['quantity']}}</td>
                    @foreach($categories as $category)
                    @if($category['id'] === $item['categorie_id'])
                    <td>{{$category['ctitle']}}</td>
                    @endif
                    @endforeach
                    <td>
                        <a href="{{url('cms/products/' . $item['id'] . '/edit')}}">Edit
                            <x-heroicon-o-pencil class="x-icon" />
                        </a>
                        <button data-toggle="modal" data-target="#deleteLink"
                            data-url="{{ url('cms/products/'. $item['id'])}}" data-title="{{$item['ptitle']}}"
                            class="ml-3 btn btn-outline-danger delete-link-btn">Delete
                            <x-heroicon-s-trash class="x-icon" />
                        </button>
                    </td>
                    <td>{{date('d/m/Y H:i', strtotime($item['updated_at']))}}</td>
                    <td>{{date('d/m/Y H:i', strtotime($item['created_at']))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        {{$products->links('pagination::bootstrap-4')}}
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="deleteLink">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Action can't be undone
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button data-loc="" class="to-delete btn btn-danger">Delete</button>
            </div>

        </div>
    </div>
</div>
@endsection
