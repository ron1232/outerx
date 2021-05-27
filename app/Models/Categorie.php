<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Models\ImageModel;

class Categorie extends MainModel
{
    use HasFactory;
    static public function save_new($request)
    {
        $image_name = ImageModel::setImage('default.jpg', $request);

        $category = new self();
        $category->ctitle = $request['title'];
        $category->cshort = $request['cshort'];
        $category->carticle = $request['article'];
        $category->curl = $request['url'];
        $category->cimage = $image_name;
        $category->save();
        Session::flash('all', $category->ctitle . 'has been saved!');
    }
    static public function update_item($request, $id)
    {
        $image_name = ImageModel::setImage(null, $request);

        $category = self::find($id);
        $category->ctitle = $request['title'];
        $category->cshort = $request['cshort'];
        $category->carticle = $request['article'];
        $category->curl = $request['url'];
        if ($image_name) $category->cimage = $image_name;
        $category->save();
        Session::flash('all', $category->ctitle . ' has been updated!');
    }
}