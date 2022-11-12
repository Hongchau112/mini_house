<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    public function about_us()
    {
        $user = Auth::guard('admin')->user();
        return view('customer.introduce.about_us', compact('user'));
    }

    public function categories()
    {
        $user = Auth::guard('admin')->user();
        $categories = RoomCategory::where('parent_category_id', 0)->get();
        return view('customer.introduce.categories', compact('user', 'categories'));
    }
}
