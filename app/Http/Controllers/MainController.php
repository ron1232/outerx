<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Session;

class MainController extends Controller
{
    static public $viewData = ['page_title' => 'OuterX | '];
    static function setPageTitle($page_title)
    {
        self::$viewData['page_title'] .= $page_title;
    }
    static function setIndex($index, $value)
    {
        self::$viewData[$index] = $value;
    }
    public function __construct()
    {
        self::setIndex('menu', Menu::all()->toArray());
    }
}