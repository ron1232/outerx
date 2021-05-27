<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Order;
use App\Models\User;
use Session;


class UserController extends MainController
{
    public function getSignin()
    {
        self::setPageTitle("Sign In");
        return view('signin', self::$viewData);
    }
    public function postSignin(SigninRequest $request)
    {
        if (User::validate($request['email'], $request['password'])) {
            $rn = !empty($request['rn']) ? $request['rn'] : '';
            return redirect($rn);
        }
        return $this->getSignin()->withErrors('Wrong email or password');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['user_name', 'user_id', 'is_admin', 'user_image']);
        $request->session()->flash('user', 'Logged Out Successfully');
        return redirect('user/signin');
    }
    public function getSignup()
    {
        self::setPageTitle("Sign Up");
        return view('signup', self::$viewData);
    }
    public function postSignup(SignupRequest $request)
    {
        User::save_new($request);
        $rn = !empty($request['rn']) ? $request['rn'] : '';
        return redirect($rn);
    }
    public function getProfile()
    {
        self::setPageTitle("Profile");
        self::setIndex('user', User::find(Session::get('user_id')));
        self::setIndex('orders', Order::where('user_id', Session::get('user_id'))->get());
        return view('profile', self::$viewData);
    }
    public function putProfile(ProfileRequest $request)
    {
        User::update_user($request);
        return redirect('user/profile');
    }
}