<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB, Session;

class Content extends MainModel
{
    use HasFactory;
    static public function getContent($url)
    {
        $contents = DB::table('contents AS c')
            ->join('menus as m', 'm.id', '=', 'c.menu_id')
            ->where('m.url', '=', $url)
            ->select('c.*', 'm.title')
            ->get()
            ->toArray();
        return $contents;
    }
    static public function save_new($request)
    {
        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->ctitle = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('all', $content->ctitle . ' has been saved!');
    }
    static public function update_item($request, $id)
    {
        $content = self::find($id);
        $content->menu_id = $request['menu_id'];
        $content->ctitle = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('all', $content->ctitle . ' has been saved!');
    }
}