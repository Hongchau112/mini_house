<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostCategoryController extends Controller
{
    public function index()
    {
        if (Session::get('user_id')==null)
        {
            return redirect()->route('admin.login');
        }
        $user = Auth::guard('web')->user();
        $post_category = PostCategory::paginate(10);
        return view('admin.post_categories.index', compact('user','post_category'));
    }

    public function create()
    {
        $user = Auth::guard('web')->user();
        $post_category = PostCategory::all();
        return view('admin.post_categories.create', compact('user', 'post_category'));
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
        $post_category = new PostCategory();
        $post_category->name = $validated_data['name'];
        $post_category->description = $validated_data['description'];
        $post_category->parent_category_id = $validated_data['parent_category_id'];
        $post_category->save();

        return redirect()->route('admin.post_categories.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit($id)
    {
        $user = Auth::guard('web')->user();
        $post_category = PostCategory::find($id);
        $categories = PostCategory::all();
        return view('admin.post_categories.edit', compact('user', 'post_category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('web')->user();
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_category_id' => 'required',
        ]);

        $post_category = PostCategory::find($id);
        $post_category->name = $validated_data['name'];
        $post_category->description = $validated_data['description'];
        $post_category->parent_category_id = $validated_data['parent_category_id'];
        $post_category->save();

        return redirect()->route('admin.post_categories.index')->with('success', 'Sửa danh mục thành công!');
    }

    public function delete($id)
    {
        RoomCategory::where('id', $id)->delete();
        return redirect()->route('admin.room_categories.index')->with('success', 'Xóa danh mục thành công!');
    }

}
