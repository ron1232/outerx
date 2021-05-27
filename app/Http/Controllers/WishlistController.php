<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Session, Cart;

class WishlistController extends MainController
{
    public function getWishlist()
    {
        self::setIndex('wishlist', Wishlist::getWishlist(Session::get('user_id')));
        self::setPageTitle('Wish List');
        return view('wishlist', self::$viewData);
    }
    public function addToWishlist(Request $request)
    {
        if (!Cart::get($request['pid'])) {
            Wishlist::add_new(Session::get('user_id'), $request);
            return Session::flash('wishlist', 'Product was added to wishlist');
        }
        Session::flash('error', 'Product is in cart');
    }
    public function removeFromWishlist(Request $request)
    {
        Wishlist::remove_one(Session::get('user_id'), $request);
        Session::flash('wishlist', 'Product was removed from wishlist');
    }
    public function clearCart()
    {
        Wishlist::clear(Session::get('user_id'));
    }
    public function has($pid)
    {
        Wishlist::find_one(Session::get('user_id'), $pid);
    }
}