@extends('master')
@section('main_content')
<div class="container">
    @if($orders->count())
    <div class="row">
        <div class="col-12 mt-3">
            <p>Your Orders:</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>User</th>
                        <th>Order</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>
                            <ul>
                                @foreach(unserialize($order->data) as $item)
                                <li>
                                    {{$item['name']}},
                                    Quantity: {{$item['quantity']}},
                                    Price: ${{$item['price']}}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>${{$order->total}}</td>
                        <td>{{date('d/m/Y H:i:s', strtotime($order->created_at))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-12 mt-50">
            <form method="POST" novalidate="novalidate" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <h6 class="widget-title border-left mb-50">Edit Profile</h6>
                <div class="login-account p-30 box-shadow">

                    <input type="hidden" name="id" value="{{$user->id}}">
                    <p>Change Details</p>
                    <div class="row">
                        <div class="col-sm-12">
                            @error('name')
                            <div class="text-danger">
                                * {{$message}}
                            </div>
                            @enderror
                            <input type="text" name="name" value="{{(old('name')) ?: $user->name}}"
                                placeholder="Full name" style="font-size: 1.5rem"
                                class="@error('name') is-invalid @enderror">
                        </div>
                        <div class="col-sm-12">
                            @error('country')
                            <div class="text-danger">
                                * {{$message}}
                            </div>
                            @enderror
                            <select class="custom-select countries @error('country') is-invalid @enderror"
                                name="country" style="font-size: 1.5rem">
                                <option selected value="{{$user->country}}">{{$user->country}}</option>
                            </select>
                        </div>
                    </div>
                    @error('email')
                    <div class="text-danger">
                        * {{$message}}
                    </div>
                    @enderror
                    <input type="text" value="{{(old('email')) ?: $user->email}}" placeholder="Email address here..."
                        name="email" style="font-size: 1.5rem" class="@error('email') is-invalid @enderror">
                    @error('password')
                    <div class="text-danger">
                        * {{$message}}
                    </div>
                    @enderror
                    <hr>
                    <p>Change Password</p>
                    <input type="password" name="old_password" class="@error('password') is-invalid @enderror"
                        placeholder="Old Password" style="font-size: 1.5rem">
                    <input type="password" name="password" class="@error('password') is-invalid @enderror"
                        placeholder="Password" style="font-size: 1.5rem">
                    <input type="password" name="password_confirmation" class="@error('password') is-invalid @enderror"
                        placeholder="Confirm Password" style="font-size: 1.5rem">
                    <hr>
                    <p>Upload Image</p>
                    @if(Session::has('user_image'))
                    <div class="row">
                        <div class="col-sm-6">
                            <img class="img-thumbnail" width="70"
                                src="{{asset('storage/images/' . Session::get('user_image'))}}" alt="">
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group inputDnD">
                                <label class="sr-only" for="inputFile">File Upload</label>
                                <input name="image" type="file" class="form-control-file font-weight-bold"
                                    id="inputFile" accept="image/*" onchange="readUrl(this)"
                                    data-title="Drag and drop an image or click the box">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register"
                                style="font-size: 1.5rem; cursor: pointer">Update Details</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
