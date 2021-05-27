@extends('cms.cms_master')
@section('cms_content')

@include('cms.cms_header', ['title' => 'Edit Product'])
<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/products/' . $item['id'])}}" method="POST" novalidate="novalidate" autocomplete="off"
            enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <input type="hidden" name="item_id" value="{{$item['id']}}">
            <div class="form-group">
                <label for="categorie-id">* Category</label>
                @error('categorie_id')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <select class="form-control @error('categorie_id') is-invalid @enderror" name="categorie_id"
                    id="categorie">
                    <option value="">Choose Category...</option>
                    @foreach ($categories as $category)
                    <option {{$item['categorie_id'] == $category['id'] ? 'selected' : ''}} value="{{$category['id']}}">
                        {{$category['ctitle']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="ptitle">* Title</label>
                @error('ptitle')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('ptitle') is-invalid @enderror form-control origin-text" name="ptitle"
                    id="ptitle" value="{{(old('title')) ?: $item['ptitle']}}">
            </div>
            <div class="form-group">
                <label for="price">* Price (In $)</label>
                @error('price')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="number" class="@error('price') is-invalid @enderror form-control" name="price" id="price"
                    value="{{(old('price')) ?: $item['price']}}">
            </div>
            <div class="form-group">
                <label for="quantity">* Quantity</label>
                @error('quantity')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="number" class="@error('quantity') is-invalid @enderror form-control" name="quantity"
                    id="quantity" value="{{(old('quantity')) ?: $item['quantity']}}">
            </div>
            <div class="form-group">
                <label for="url">* URL</label>
                @error('purl')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('purl') is-invalid @enderror form-control target-text" name="purl"
                    id="purl" value="{{(old('purl')) ?: $item['purl']}}">
            </div>
            <div class="form-group">
                <label for="particle">* Article</label>
                @error('particle')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <textarea name="particle" id="article" class="@error('particle') is-invalid @enderror form-control"
                    cols="30" rows="10">{{(old('particle')) ?: $item['particle']}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Product Image</label>
                <p>
                    <img src="{{asset('storage/images/' . $item['pimage'])}}" class="img-thumbnail" width="80">
                </p>
            </div>
            <div class="form-group">
                @error('image')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group inputDnD">
                            <label class="sr-only" for="inputFile">File Upload</label>
                            <input name="image" type="file" class="form-control-file font-weight-bold" id="inputFile"
                                accept="image/*" onchange="readUrl(this)"
                                data-title="Drag and drop a file or click the box">
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Update Product" class="btn btn-primary mt-3" name="submit">
            <a href="{{url('cms/products')}}" class="btn btn-secondary mt-3">Cancel</a>
        </form>
    </div>
</div>

@endsection
