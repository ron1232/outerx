<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB, Session;

class Wishlist extends MainModel
{
    static public function getWishlist($user_id)
    {
        if ($user_id) {
            $wishlist = DB::table('wish_list AS w')
                ->join('products AS p', 'w.product_id', '=', 'p.id')
                ->select('p.*')
                ->where('w.user_id', '=', $user_id)
                ->get();
            return $wishlist;
        }
    }
    static public function getTotal()
    {
        if (Session::has('user_id')) {
            $total = DB::table('wish_list')
                ->where('user_id', '=', Session::get('user_id'))
                ->count('product_id');
            return $total;
        }
        return 0;
    }
    static public function find_one($product_id)
    {
        if (Session::has('user_id')) {
            $wish = DB::table('wish_list AS w')
                ->select('*')
                ->where([['user_id', '=', Session::get('user_id')], ['product_id', '=', $product_id]])
                ->get()
                ->toArray();
            if (empty($wish)) return null;
            return $wish;
        }
        return null;
    }
    static public function add_new($user_id, $request)
    {
        DB::table('wish_list')->insert(['user_id' => $user_id, 'product_id' => $request['pid']]);
    }
    static public function remove_one($user_id, $request)
    {
        DB::table('wish_list')->where([['user_id', '=', $user_id], ['product_id', '=', $request['pid']]])->delete();
    }
    static public function clear($user_id)
    {
        DB::table('wish_list')->where('user_id', '=', $user_id)->delete();
    }
}