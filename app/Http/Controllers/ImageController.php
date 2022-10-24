<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function load(Request $request)
    {
        $images = Image::all();
//        $images = Image::where('room_id', $id)->get();
        if ($images) {
            foreach ($images as $image) {
                $output .= '
        <div class="col-md-2" style="margin-bottom:16px;" align="center">
        <img src="' . asset('images/' . $image->image_path) . '" class="img-thumbnail" width="175px" height="175"style="height: 175px;"/>
        <button type="button" class="btn btn-link " id="' . $image->image_path . '">Xóa</button>
        </div>
        ';
            }
            $output .= '<div>';
            echo "$output";
        }
    }

}
