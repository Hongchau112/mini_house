<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomCategoryController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        $room_category = RoomCategory::paginate(10);
        return view('admin.room_categories.index', compact('user','room_category'));
    }

    public function create()
    {
        $user = Auth::guard('web')->user();
        $room_category = RoomCategory::all();
        return view('admin.room_categories.create', compact('user', 'room_category'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('web')->user();
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_category_id' => 'required',
        ]);
//        var_dump($validated_data);exit();
        $room_category = new RoomCategory();
        $room_category->name = $validated_data['name'];
        $room_category->description = $validated_data['description'];
        $room_category->parent_category_id = $validated_data['parent_category_id'];
        $room_category->save();

        return redirect()->route('admin.room_categories.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit($id)
    {
        $user = Auth::guard('web')->user();
        $room_category = RoomCategory::find($id);
        $categories = RoomCategory::all();
        return view('admin.room_categories.edit', compact('user', 'room_category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('web')->user();
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_category_id' => 'required',
        ]);

        $room_category = RoomCategory::find($id);
        $room_category->name = $validated_data['name'];
        $room_category->description = $validated_data['description'];
        $room_category->parent_category_id = $validated_data['parent_category_id'];
        $room_category->save();

        return redirect()->route('admin.room_categories.index')->with('success', 'Sửa danh mục thành công!');
    }

    public function delete($id)
    {
        RoomCategory::where('id', $id)->delete();
        return redirect()->route('admin.room_categories.index')->with('success', 'Xóa danh mục thành công!');
    }

}
