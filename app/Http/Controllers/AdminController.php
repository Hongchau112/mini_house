<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Roles;
use App\Models\Social;
use App\Models\Login;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Rule;
class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
        $user = Admin::where('name', $request->name)->first();

        $user_lists = Admin::with('roles')->orderBy('id', 'ASC')->paginate(10);
//        dd($user->password);
        if (Auth::guard('admin')->attempt($credentials)) {
            if ($user->status == 0)
            {
                return view('admin.custom_auth.login_form')->with('message', 'Tài khoản đã bị khóa!');
            }
            else{
                if($request->has('rememberme')){
                    Cookie::queue('adminuser', $request->name, 1440);
                    Cookie::queue('adminpwd', $request->password, 1440);

                }
                if($user->account=='user')
                {
                    return view('customer.login.index', compact('user'));
                }
                else{
                    if($user->roles()->where('name', 'admin'))
                    {
                        return view('admin.users.index', compact('user_lists', 'user'));
                    }
                }
            }
        }else{
            return view('admin.custom_auth.login_form')->with('message', 'Tên đăng nhập hoặc mật khẩu không đúng!');
        }

    }



    public function index()
    {
        $user = Auth::guard('admin')->user();
        $user_lists = Admin::paginate(10);
        return view('admin.users.index', compact('user_lists', 'user'));
    }

    public function create()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.users.create', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $admin_roles = Roles::where('name','admin')->first();
        $staff_roles = Roles::where('name','staff')->first();
        $user_roles = Roles::where('name','user')->first();
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'new_password' => 'required|confirmed',
            'phone' => 'required',
            'sex' => 'required',
            'account' => 'required',

        ]);
//        dd($validated_data['sex']);

        $validated_data['password'] = Hash::make($request->new_password);
        $user = new Admin();
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->password = $validated_data['password'];
        $user->phone = $validated_data['phone'];
        $user->sex = $validated_data['sex'];
        $user->account = $validated_data['account'];
        $user->save();

        if($user->account=='admin'){
            $user->roles()->attach($admin_roles);
        }
        elseif ($user->account=='staff'){
            $user->roles()->attach($staff_roles);
        }
        else {
            $user->roles()->attach($user_roles);
        }

        return redirect()->route('admin.index')->with('success', 'Tạo tài khoản thành công!');
    }

    public function assign_roles(Request $request)
    {
        $user = Admin::where('email', $request->email)->first();
//        dd($request->email_role);
//        dd($user->id);
        $user->roles()->detach();
//dd($request->email);
//dd($request->admin_role);
        if ($request->admin_role){
//            dd(1);
            $user->roles()->attach(Roles::where('name', 'admin')->first());
            $user->account = 'admin';
            $user->save();
        }
        if ($request->user_role){
//            dd(1);
            $user->roles()->attach(Roles::where('name', 'user')->first());
            $user->account = 'user';
            $user->save();
        }

        return redirect()->route('admin.index')->with('success', 'Cấp quyền thành công!');
    }


    public function show($id)
    {
        $user = Auth::guard('admin')->user();
        $userList = Admin::all();
        $user_show = Admin::find($id);
        return view('admin.users.show', compact('user', 'user_show', 'userList'));
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        $user_list = Admin::all();
        $user_edit = Admin::find($id);
        return view('admin.users.edit', compact('user', 'user_edit', 'user_list'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();
        {
            $validated_data = $request->validate([
                'name' => 'required',
//                'email' => 'required|email|exists:admins,email,'.$id,
                'email' => 'required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($id),
                'phone' => 'nullable'
            ]);

            $user = Admin::find($id);
            $user->name = $validated_data['name'];
            $user->email = $validated_data['email'];
            $user->phone = $validated_data['phone'];
            $user->save();

            return redirect()->route('admin.index')->with('success', 'Sửa thông tin tài khoản thành công!');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login_auth');
    }

    public function edit_password($id)
    {
        $user = Auth::guard('admin')->user();
        $user_list = Admin::all();
        $user_edit = Admin::find($id);
        return view('admin.users.password', compact('user', 'user_edit', 'user_list'));
    }

    public function change_password(Request $request) {
        $user = Auth::guard('admin')->user();
        $user_password_old = $user->password; //mật khẩu cũ

        $request->validate([
            'password' => 'required',
            'set_new_password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required',

        ]);
        if(!Hash::check($request->password,$user_password_old)){
            return back()->withErrors(['current_password'=>'Nhập sai mật khẩu hiện tại, vui lòng nhập lại!']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('admin.index', ['user' => $user])->with('success', 'Thay đổi mật khẩu thành công!');
    }
    public function block($id)
    {
        $user = Auth::guard('admin')->user();
        $user_list = Admin::all();
        $user_lock = Admin::find($id);

        if ($user_lock->status == 0)
        {
            $user_lock->status = 1;
            $user_lock->save();
            return redirect()->route('admin.index', ['user' => $user])->with('success', 'Gỡ block thành công!');
        }else
            {
                $user_lock->status = 0;
                $user_lock->save();
                return redirect()->route('admin.index', ['user' => $user])->with('success', 'Block thành công!');
            }

    }

    function check_mail(Request $request){
         echo $request->get('email');
        if($request->get('email')){
            $email_check = $request->get('email');
            $data = Admin::where('email', $email_check)->count();
            if($data > 0){
                echo 'exist';
            }

        }
    }


    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook_1(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
//        dd($account);
        if($account){
            //login in vao trang quan tri
            $account_name = Login::where('id',$account->user)->first();
            Session::put('name',$account_name->name);
            Session::put('id',$account_name->id);
            return redirect()->route('admin.index');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'name' => $provider->getName(),
                    'email' => $provider->getEmail(),
                    'password' => '',
                    'phone' => '',

                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = Login::where('id',$account->user)->first();

            Session::put('name',$account_name->name);
            Session::put('id',$account_name->id);
            return redirect()->route('admin.index');
        }
    }

    public function callback_facebook()
    {
//        dd(1);
        try {
            $user = Socialite::driver('facebook')->user();
//            dd($user);

            $finduser = Admin::where('social_id', $user->id)->first();

            if($finduser){
//                dd('2');
                Auth::loginUsingId($finduser->id);
//                return redirect()->route('admin.index');
            }else{
                $newUser = Admin::updateOrCreate([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'social_id'=> $user->getId(),
                    'password' => '',
                    'phone' => '',
                    'avatar' => $user->avatar,
                ]);
                $newUser->save();
                dd($newUser);
                return redirect()->route('admin.index');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }




}
