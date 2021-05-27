@extends('master')
@section('main_content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-50">
            <form method="POST" novalidate="novalidate">
                <h6 class="widget-title border-left mb-50">NEW CUSTOMERS</h6>
                <div class="login-account p-30 box-shadow">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            @error('name')
                            <div class="text-danger">
                                * {{$message}}
                            </div>
                            @enderror
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Full name"
                                style="font-size: 1.5rem" class="@error('name') is-invalid @enderror">
                        </div>
                        <div class="col-sm-12">
                            @error('country')
                            <div class="text-danger">
                                * {{$message}}
                            </div>
                            @enderror
                            <select class="custom-select countries @error('country') is-invalid @enderror"
                                name="country" style="font-size: 1.5rem">
                                <option value="">Choose Country...</option>
                            </select>
                        </div>
                    </div>
                    @error('email')
                    <div class="text-danger">
                        * {{$message}}
                    </div>
                    @enderror
                    <input type="text" value="{{old('email')}}" placeholder="Email address here..." name="email"
                        style="font-size: 1.5rem" class="@error('email') is-invalid @enderror">
                    @error('password')
                    <div class="text-danger">
                        * {{$message}}
                    </div>
                    @enderror
                    <input type="password" name="password" class="@error('password') is-invalid @enderror"
                        placeholder="Password" style="font-size: 1.5rem">
                    <input type="password" name="password_confirmation" class="@error('password') is-invalid @enderror"
                        placeholder="Confirm Password" style="font-size: 1.5rem">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register"
                                style="font-size: 1.5rem">Register</button>
                        </div>
                        <div class="col-md-6">
                            <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset"
                                style="font-size: 1.5rem">Clear</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            @if(Request::has('rn'))
                            <a class="float-left" href="{{url('user/signin' . '?rn=' . Request::get('rn'))}}"
                                style="font-size: 1.5rem">Already
                                Registered?</a>
                            @else
                            <a class="float-left" href="{{url('user/signin')}}" style="font-size: 1.5rem">Already
                                Registered?</a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
