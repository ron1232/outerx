<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Dashboard extends MainModel
{
    use HasFactory;
    static public function lastOrders(&$viewData)
    {
        $orders = DB::table('orders AS o')
            ->join('users AS u', 'u.id', '=', 'o.user_id')
            ->select('o.*', 'u.name')
            ->latest()
            ->limit(3)
            ->get();
        $viewData['last_orders'] = $orders;
    }
    static public function new_products(&$viewData)
    {
        $viewData['categories'] = Categorie::all()->toArray();
        $viewData['new_products'] = Product::latest()->limit(3)->get();
    }
    static public function new_accounts(&$viewData)
    {
        $viewData['new_accounts'] = User::latest()->select('id', 'name', 'email', 'country', 'updated_at', 'created_at')->limit(3)->get();
    }
}