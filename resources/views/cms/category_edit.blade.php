@extends('cms.cms_master')
@section('cms_content')

@include('cms.cms_header', ['title' => 'Edit Category'])
<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/categories/' . $item['id'])}}" method="POST" novalidate="novalidate" autocomplete="off"
            enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
            <input type="hidden" name="item_id" value="{{$item['id']}}">
            <div class="form-group">
                <label for="title">* Title</label>
                @error('title')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('title') is-invalid @enderror form-control origin-text" name="title"
                    id="title" value="{{(old('title')) ?: $item['ctitle']}}">
            </div>
            <div class="form-group">
                <label for="url">* URL</label>
                @error('url')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('url') is-invalid @enderror form-control target-text" name="url"
                    id="url" value="{{(old('url')) ?: $item['curl']}}">
            </div>
            <div class="form-group">
                <label for="cshort">* Short Description</label>
                @error('cshort')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('cshort') is-invalid @enderror form-control" name="cshort" id="cshort"
                    value="{{(old('cshort')) ?: $item['cshort']}}">
            </div>
            <div class="form-group">
                <label for="article">* Article</label>
                @error('article')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <textarea name="article" id="article" class="@error('article') is-invalid @enderror form-control"
                    cols="30" rows="10">{{(old('article')) ?: $item['carticle']}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Category Image</label>
                <p>
                    <img src="{{asset('storage/images/' . $item['cimage'])}}" class="img-thumbnail" width="80">
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
            <input type="submit" value="Save Menu" class="btn btn-primary mt-3" name="submit">
            <a href="{{url('cms/menu')}}" class="btn btn-secondary mt-3">Cancel</a>
        </form>
    </div>
</div>

@endsection
