@extends('cms.cms_master')
@section('cms_content')

@include('cms.cms_header', ['title' => '+ Add New Menu Link'])
<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/menu')}}" method="POST" novalidate="novalidate" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="link">* Link</label>
                @error('link')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('link') is-invalid @enderror form-control origin-text" name="link"
                    id="link" value={{old('link')}}>
            </div>
            <div class="form-group">
                <label for="url">* URL</label>
                @error('url')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('url') is-invalid @enderror form-control target-text" name="url"
                    id="url" value={{old('url')}}>
            </div>
            <div class="form-group">
                <label for="title">* Title</label>
                @error('title')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('title') is-invalid @enderror form-control" name="title" id="title"
                    value={{old('title')}}>
            </div>
            <input type="submit" value="Save Menu" class="btn btn-primary" name="submit">
            <a href="{{url('cms/menu')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
