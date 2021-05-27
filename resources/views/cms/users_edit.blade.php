@extends('cms.cms_master')
@section('cms_content')

@include('cms.cms_header', ['title' => 'Edit User'])
<div class="row">
    <div class="col-md-8">
        <form action="{{url('cms/users/' . $user->id)}}" method="POST" novalidate="novalidate" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
            <input type="hidden" value="{{$user->id}}" name="id">
            <div class="form-group">
                <label for="name">* Name</label>
                @error('name')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('name') is-invalid @enderror form-control" name="name" id="name"
                    value="{{old('name') ?: $user->name}}">
            </div>
            <div class="form-group">
                <label for="email">* Email</label>
                @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="text" class="@error('email') is-invalid @enderror form-control" name="email" id="email"
                    value="{{old('email') ?: $user->email}}">
            </div>
            <div class="form-group">
                <label for="password">* Password</label>
                @error('password')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="password" class="@error('password') is-invalid @enderror form-control" name="password"
                    id="password" value="{{old('password')}}">
            </div>
            <div class="form-group">
                <label for="password_confirmation">* Confirm Password</label>
                @error('password_confirmation')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <input type="password" class="@error('password_confirmation') is-invalid @enderror form-control"
                    name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}">
            </div>
            <div class="form-group">
                <label for="country">* Country</label>
                @error('country')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <select name="country" class="@error('country') 'is-invalid' @enderror form-control countries"
                    id="country">
                    <option selected value="{{$user->country}}">{{$user->country}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="permission">* Permission</label>
                @error('permission')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
                <select name="permission" class="@error('permission') 'is-invalid' @enderror form-control"
                    id="permission">
                    @foreach($permissions as $permission)
                    <option {{$permission->id != $user_permissions->pid ?: 'selected'}} value="{{$permission->id}}">
                        {{$permission->pname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">User Image</label>
                <p>
                    @if($user->image)
                    <img src="{{asset('storage/images/' . $user->image)}}" class="img-thumbnail" width="80">
                    @else
                    <p><i>No Image...</i></p>
                    @endif
                </p>
            </div>
            <div class="form-group">
                <label for="image" class="sr-only">User Image</label>
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
            <input type="submit" value="Save User" class="btn btn-primary mt-3" name="submit">
            <a href="{{url('cms/users')}}" class="btn btn-secondary mt-3">Cancel</a>
        </form>
    </div>
</div>

@endsection
