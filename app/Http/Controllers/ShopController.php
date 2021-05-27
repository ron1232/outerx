<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use Cart, Response;
use Session;
use App\Models\Order;

class ShopController extends MainController
{
    public function categories()
    {
        self::setIndex('categories', Categorie::all());
        self::setPageTitle('Shop Categories');
        return view('categories', self::$viewData);
    }

    public function products(Request $request)
    {
        // Title is set using the Product Model
        Product::getProducts($request, self::$viewData);
        self::setIndex('categories', Categorie::all());
        return view('products', self::$viewData);
    }

    public function item($purl)
    {
        self::setIndex('categories', Categorie::all());
        Product::getProduct($purl, self::$viewData);
        return view('product', self::$viewData);
    }

    public function addToCart(Request $request)
    {
        Product::addToCart($request['pid'], $request['qty']);
    }

    public function cart()
    {
        self::setPageTitle('Shop Cart');
        Product::getCartContent(self::$viewData);
        return view('cart', self::$viewData);
    }
    public function clearCart()
    {
        Cart::clear();
        Session::flash('rm', 'Cart was cleared');
    }
    public function removeItem($pid)
    {
        Cart::remove($pid);
        Session::flash('rm', 'Product was removed');
        return redirect('shop/cart');
    }
    public function updateCart(Request $request)
    {
        Product::updateCart($request['pid'], $request['op']);
    }

    public function orderNow()
    {
        if (Cart::isEmpty()) return redirect('/');
        if (!Session::has('user_id')) return redirect('user/signup?rn=shop/cart');
        Order::save_new();
        return redirect('shop');
    }

    public function searchProducts(Request $request)
    {
        $products = Product::findByTitle($request['searchTerm']);
        return Response::json($products);
    }
}