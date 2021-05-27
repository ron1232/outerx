@extends('master')
@section('main_content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="mt-50">
                <div class="registered-customers">
                    <h6 class="widget-title border-left mb-50">REGISTERED CUSTOMERS</h6>
                    <form method="POST" novalidate>
                        @csrf()
                        <div class="login-account p-30 box-shadow">
                            <p style="font-weight: 600; font-size: 1.5rem">If you have an account with us, Please log
                                in.
                            </p>
                            @error('0')
                            <div class="text-danger">
                                * {{$message}}
                            </div>
                            @enderror
                            @error('email')
                            <div class="text-danger">
                                * {{$message}}
                            </div>
                            @enderror
                            <input type="text" value="{{old('email')}}" style='font-size: 1.5rem' class="is-invalid"
                                name="email" placeholder="Email Address">
                            @error('password')
                            <div class="text-danger">
                                * {{$message}}
                            </div>
                            @enderror
                            <input type="password" style="font-size: 1.5rem" name="password" placeholder="Password">
                            <p style="font-weight: 600; font-size: 1.5rem"><small><a href="#">Forgot your
                                        password?</a></small>
                            </p>
                            <button class="submit-btn-1 btn-hover-1" type="submit"
                                style="cursor: pointer; font-size: 1.5rem">login</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
