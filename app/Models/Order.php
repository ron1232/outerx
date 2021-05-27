<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart, Session, DB;

class Order extends MainModel
{
    use HasFactory;

    static public function getOrders()
    {
        return DB::table('orders AS o')
            ->join('users AS u', 'u.id', '=', 'o.user_id')
            ->select('o.*', 'u.name')
            ->paginate(10);
    }

    static public function save_new()
    {
        $cart = Cart::getContent()->toJson();
        $cart = json_decode($cart, true);
        foreach ($cart as $item) {
            $product = Product::find($item['id']);
            if (!$product->quantity) return;
            $product->quantity -= $item['quantity'];
            $product->save();
        }
        $order = new self();
        $order->user_id = Session::get('user_id');
        $order->data = serialize($cart);
        $order->total = Cart::getTotal();
        $order->save();
        Session::flash('order', 'Your order was saved!');
        Cart::clear();
    }
}