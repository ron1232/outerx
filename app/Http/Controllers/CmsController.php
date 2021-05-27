<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Order;
use Session;

class CmsController extends MainController
{
    public function dashboard()
    {
        Dashboard::lastOrders(self::$viewData);
        Dashboard::new_products(self::$viewData);
        Dashboard::new_accounts(self::$viewData);
        return view('cms.dashboard', self::$viewData);
    }

    public function orders()
    {
        self::setIndex('orders', Order::getOrders());
        return view('cms.orders', self::$viewData);
    }
    public function deleteOrder($id)
    {
        Order::destroy($id);
        Session::flash('all', 'Order has been deleted');
    }
}