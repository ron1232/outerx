<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image;

class ImageModel extends MainModel
{
    use HasFactory;
    static public function setImage($default_name, $request)
    {
        $image_name = $default_name;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            if (preg_match('/.*\.(jpe?g|png|gif|bmp|svg|webp)$/i', $file->getClientOriginalName())) {
                $image_name = date('d.m.Y.H.i.s') . rand(0, 9) . '-' . $file->getClientOriginalName();
                $request->file('image')->move(public_path() . '/storage/images', $image_name);
                $img = Image::make(public_path() . '/storage/images/' . $image_name);
                $img->resize(480, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save();
            }
        }
        return $image_name;
    }
}