<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\RoomCategory;
use App\Models\Image;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index()
    {
        if (Session::get('user_id')==null)
        {
            return redirect()->route('admin.login');
        }
        $user = Auth::guard('web')->user();
        $user_lists = Admin::paginate(10);
        return view('admin.users.index', compact('user_lists', 'user'));
    }

    public function login_auth()
    {
        return view('customer.login.login_auth');
    }

    public function logout_user()
    {
        Auth::guard('web')->logout();
        return redirect()->route('customer.login_auth');
    }

    public function register_check()
    {
        return view('customer.login.register_auth');
    }

//    public function register_auth(Request $request)
//    {
//        $user = new User();
////        dd($request);
//        $validated_data = $request->validate([
//            'name' => 'required',
//            'email' => 'required|email',
//            'password' => 'required',
//            'phone' => 'required',
//            'sex' => 'required'
//        ]);
//        dd(1);
//
//        $validated_data['password'] = Hash::make($request->password);
//
//        $user->name = $validated_data['name'];
//        $user->email = $validated_data['email'];
//        $user->password = $validated_data['password'];
//        $user->phone = $validated_data['phone'];
//        $user->sex = $validated_data['sex'];
//        $user->save();
//        return route('customer.login_auth')->with('message', 'Đăng ký tài khoản thành công');

//    }




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
