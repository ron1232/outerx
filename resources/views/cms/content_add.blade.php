@extends('cms.cms_master')
@section('cms_content')

@include('cms.cms_header', ['title' => '+ Add New Content Link'])
<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/content')}}" method="POST" novalidate="novalidate" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="menu_id">* Menu </label>
                @error('menu_id')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <select name="menu_id" class="@error('menu_id') 'is-invalid' @enderror form-control" id="menu_id">
                    <option value="">Choose Menu Link...</option>
                    @foreach ($menu as $item)
                    <option {{old('menu_id') == $item['id'] ? 'selected' : ''}} value="{{$item['id']}}">
                        {{$item['link']}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">* Title</label>
                @error('title')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('title') is-invalid @enderror form-control origin-text" name="title"
                    id="title" value={{old('title')}}>
            </div>
            <div class="form-group">
                <label for="article">* Article</label>
                @error('article')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <textarea name="article" id="article" class="@error('article') is-invalid @enderror form-control"
                    cols="30" rows="10">{{old('article')}}</textarea>
            </div>
            <input type="submit" value="Save Content" class="btn btn-primary" name="submit">
            <a href="{{url('cms/content')}}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
