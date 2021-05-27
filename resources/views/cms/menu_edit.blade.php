@extends('cms.cms_master')
@section('cms_content')

@include('cms.cms_header', ['title' => 'Edit Menu Link'])
<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/menu/' . $item['id'])}}" method="POST" novalidate="novalidate" autocomplete="off">
            @csrf
            {{method_field('PUT')}}
            <input type="hidden" name="item_id" value="{{$item['id']}}">
            <div class="form-group">
                <label for="link">* Link</label>
                @error('link')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('link') is-invalid @enderror form-control origin-text" name="link"
                    id="link" value="{{(old('link')) ?: $item['link']}}">
            </div>
            <div class="form-group">
                <label for="url">* URL</label>
                @error('url')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('url') is-invalid @enderror form-control target-text" name="url"
                    id="url" value="{{(old('url')) ?: $item['url']}}">
            </div>
            <div class="form-group">
                <label for="title">* Title</label>
                @error('title')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('title') is-invalid @enderror form-control" name="title" id="title"
                    value="{{(old('title')) ?: $item['title']}}">
            </div>
            <input type="submit" value="Edit Menu Link" class="btn btn-primary" name="submit">
            <a href="{{url('cms/menu')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</div>

@endsection
