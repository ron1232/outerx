<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB, Response;
use Cart;
use Session;
use App\Models\ImageModel;

class Product extends MainModel
{
    use HasFactory;
    static public function getProducts($request, &$viewData)
    {
        $products = DB::table('products as p')
            ->join('categories as c', 'c.id', '=', 'p.categorie_id')
            ->select('p.*', 'c.ctitle', 'c.carticle', 'c.curl', 'c.cimage')
            ->where('c.curl', '=', $request->curl);

        if ($request->has('orderBy')) {
            strtolower($request->query('orderBy')) == 'asc' && $products = $products->orderBy('price', 'ASC');
            strtolower($request->query('orderBy')) == 'desc' && $products = $products->orderBy('price', 'desc');
        }

        $products = $products->paginate(10);
        if (!$products->count()) {
            abort(404);
        }
        $viewData['products'] = $products;
        $viewData['page_title'] .= $products[0]->ctitle . ' Products';
    }
    static public function getProduct($purl, &$viewData)
    {
        if ($product = Product::where('purl', '=', $purl)->first()) {
            $product = $product->toArray();
        } else {
            abort(404);
        }
        $viewData['product'] = $product;
        $viewData['page_title'] .= $product['ptitle'];
    }
    static public function addToCart($pid, $qty)
    {
        if (is_numeric($pid) && $product = self::find($pid)) {
            $product = $product->toArray();
            if (is_numeric($qty) && $qty == floor($qty) && $qty <= $product['quantity'] && $qty > 0) {
                if (!Cart::get($pid)) {
                    Cart::add($pid, $product['ptitle'], $product['price'], $qty, [
                        'image' => $product['pimage'], 'url' => $product['purl']
                    ]);
                    Session::flash('sm', $product['ptitle'] . ' was added to your cart!');
                }
            }
        }
    }
    static public function getCartContent(&$viewData)
    {
        if ($cart = Cart::getContent()) {
            $cart = $cart->toArray();
            sort($cart);
            $viewData['cart'] = $cart;
        }
    }
    static public function updateCart($pid, $op)
    {
        $product = self::find($pid);
        if (is_numeric($pid) && Cart::get($pid)) {
            if (Cart::get($pid)->quantity < $product['quantity']) {
                if ($op == 'ad') Cart::update($pid, ['quantity' => 1]);
            }
            if ($op == 'mn') Cart::update($pid, ['quantity' => -1]);
        }
    }

    static public function save_new($request)
    {
        $image_name = ImageModel::setImage('default.jpg', $request);

        $product = new self();
        $product->categorie_id = $request['categorie_id'];
        $product->ptitle = $request['ptitle'];
        $product->particle = $request['particle'];
        $product->purl = $request['purl'];
        $product->pimage = $image_name;
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        $product->save();
        Session::flash('all', $product->ptitle . ' has been saved!');
    }

    static public function update_item($request, $id)
    {
        $image_name = ImageModel::setImage(null, $request);

        $product = self::find($id);
        $product->categorie_id = $request['categorie_id'];
        $product->ptitle = $request['ptitle'];
        $product->particle = $request['particle'];
        $product->purl = $request['purl'];
        if ($image_name) $product->pimage = $image_name;
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        $product->save();
        Session::flash('all', $product->ptitle . ' has been updated!');
    }

    static public function findByTitle($searchTerm)
    {
        $products = self::where('ptitle', 'LIKE', "%{$searchTerm}%")
            ->select('ptitle', 'purl')
            ->get();
        return $products;
    }
}