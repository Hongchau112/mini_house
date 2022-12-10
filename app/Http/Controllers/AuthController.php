<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('admin.custom_auth.register_form');
    }

    public function login_auth()
    {
        return view('admin.custom_auth.login_form');
//        return view('admin.custom_auth.login.login_form');
    }

    public function register_auth(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'phone' => 'required',
            'sex' => 'required'

        ]);

        $admin_roles = Roles::where('name','admin')->first();
        $staff_roles = Roles::where('name','staff')->first();
        $user_roles = Roles::where('name','user')->first();

        $validated_data['password'] = Hash::make($request->password);
        $user = new User();
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->password = $validated_data['password'];
        $user->phone = $validated_data['phone'];
        $user->sex = $validated_data['sex'];
        $user->account = "user";
        $user->save();
//        $user->roles()->attach($user_roles);

        return view('admin.custom_auth.login_form')->with('message', 'Đăng ký tài khoản thành công');

    }




}
