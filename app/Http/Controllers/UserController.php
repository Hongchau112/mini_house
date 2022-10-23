<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Food;
use App\Models\RoomCategory;
use App\Models\Image;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $user_lists = Admin::with('roles')->orderBy('id', 'DESC')->paginate(5);
        return view('admin.users.index', compact('user_lists', 'user'));
    }

    public function all_foods()
    {
        $user = Auth::guard('admin')->user();
        $foods = Food::paginate(8);
        $food_categories = RoomCategory::all();
        $images = Image::all();
        return view('user.pages.index', compact('foods', 'user', 'images', 'food_categories'));
    }

    public function assign_roles(Request $request)
    {
//        dd($request->all());
        $user = Admin::where('email', $request->email)->first();
//        dd($request->email);
        $user->roles()->detach();


        if ($request->admin_role){
            $user->roles()->attach(Roles::where('name', 'admin')->first());
        }
        if ($request->user_role){
            $user->roles()->attach(Roles::where('name', 'user')->first());
        }
        return redirect()->back()->with('success', 'Cấp quyền thành công!');
    }

    public function search(Request $request)
    {
        $user = Auth::guard('admin')->user();

        $search = $request->get('search');
//        dd($search);
        $user_lists = Admin::where('name', 'LIKE', '%' . $search . '%')->get();
        if (count($user_lists)>0)

            return view('admin.users.search', compact('user_lists', 'user'));
        else
            return view('admin.users.not_found', compact('user'));
    }

    public function filter_search(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $user_lists = Admin::with('roles')->orderBy('id', 'DESC')->paginate(10);
        $filter_search = $request->get('filter');
        if($filter_search=='all')
            return view('admin.users.search' ,compact('user_lists', 'user'));
        else
        {
            $user_result = Admin::where('account', $filter_search)->get();
//        dd($user_list);
            if(count($user_result) > 0)
                $user_lists = $user_result;
            return view('admin.users.search' ,compact('user_lists', 'user'));

        }
//        dd($filter_search);

    }

    public function sex_search(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $user_lists = Admin::with('roles')->orderBy('id', 'DESC')->paginate(10);
        $filter_search = $request->get('sex');
        if($filter_search=='all')
            return view('admin.users.search' ,compact('user_lists', 'user'));
        else
        {
            $user_result = Admin::where('sex', $filter_search)->get();
//        dd($user_list);
            if(count($user_result) > 0)
                $user_lists = $user_result;
            return view('admin.users.search' ,compact('user_lists', 'user'));

        }
//        dd($filter_search);

    }


}
