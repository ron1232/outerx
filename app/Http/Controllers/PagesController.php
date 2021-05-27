<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Product;

class PagesController extends MainController
{
    public function home()
    {
        self::setIndex('products', Product::limit(4)->get());
        self::setPageTitle('Home Page');
        return view('home', self::$viewData);
    }
    public function content($url)
    {
        self::setIndex('contents', Content::getContent($url));
        !empty(self::$viewData['contents'])
            ? self::setPageTitle(self::$viewData['contents'][0]->title)
            : self::setPageTitle('Site Content');
        return view('content', self::$viewData);
    }
}