<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Roles;
use App\Models\Room;
use App\Models\Social;
use App\Models\Login;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Rule;
use Session;
use App\Http\Controllers\Validator;
use Symfony\Component\Console\Input\Input;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        $rooms = Room::all();
        $images = Image::all();
        $user_lists = User::paginate(10);
//        dd($user->password);
        if (Auth::guard('web')->attempt($credentials)) {
//            dd(1);
            Session::put('user_id', $user->id);
            if ($user->status == 0)
            {
                return view('admin.custom_auth.login_form')->with('message', 'Tài khoản đã bị khóa!');
            }
            else{
                if($request->has('rememberme')){
                    Cookie::queue('adminuser', $request->email, 1440);
                    Cookie::queue('adminpwd', $request->password, 1440);

                }
//                dd(1);
                if($user->account=='user')
                {
                    return redirect()->route('customer.index', 'user');
                }
                elseif ($user->account=='admin')
                {
                    return view('admin.users.index', compact('user_lists', 'user'));
                }
                elseif ($user->account=='staff')
                {
                    return view('admin.users.index', compact('user_lists', 'user'));
                }
            }
        }else{
            return view('admin.custom_auth.login_form')->with('message', 'Tên đăng nhập hoặc mật khẩu không đúng!');
        }

    }




    public function index()
    {
        $user = Auth::guard('web')->user();
        $user_lists = User::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('user_lists', 'user'));
    }


    public function create()
    {
        $user = Auth::guard('web')->user();
        return view('admin.users.create', ['user' => $user]);
    }

    public function store(Request $request)
    {

        $admin_roles = Roles::where('name','admin')->first();
        $staff_roles = Roles::where('name','staff')->first();
        $user_roles = Roles::where('name','user')->first();
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'new_password' => 'required|confirmed',
            'phone' => 'required | between: 10,12',
            'sex' => 'required',
            'account' => 'required',
            'address' => 'required',
            'avatar' => 'required',
            'birthday' => 'required'

        ]);


//        dd($validated_data['sex']);

        $validated_data['password'] = Hash::make($request->new_password);
        $user = new User();
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->password = $validated_data['password'];
        $user->phone = $validated_data['phone'];
        $user->sex = $validated_data['sex'];
        $user->account = $validated_data['account'];
        $user->status = 1;
        $user->address = $validated_data['address'];
        $user->birthday = $validated_data['birthday'];


        //save avatar
        if($request->hasFile('avatar')){
            $filename = time().'.'.request()->avatar->getClientOriginalExtension();
            request()->avatar->move(public_path('images'), $filename);
//            dd($filename);
            $user->avatar = $filename;
        }
        $user->save();


        return redirect()->route('admin.index')->with('success', 'Tạo tài khoản thành công!');
    }

    public function change_role($id)
    {
        $user = Auth::guard('web')->user();
        $user_find = Admin::find($id);
        return view('admin.users.change_role', compact('user', 'user_find'));
    }


    public function assign_roles(Request $request, $id)
    {
//        dd($request->change_role);
        $user = Auth::guard('web')->user();
        $user_find = User::find($id);
        $validated_data = $request->validate([
            'password' => 'required | confirmed |between: 6,100',
            'change_role' => 'required',
        ]);
        if(Hash::check($request->password, $user->password)) {
            //neu mat khau admin hop le thi co the thay doi quyen
            $user->roles()->detach();
            if ($request->change_role=='admin'){
//            dd(1);
                $user_find->roles()->attach(Roles::where('name', 'admin')->first());
                $user_find->account = 'admin';
                $user_find->save();
            }
            elseif ($request->change_role=='user'){
//            dd(1);
                $user_find->roles()->attach(Roles::where('name', 'user')->first());
                $user_find->account = 'user';
                $user_find->save();
            }
            elseif ($request->change_role=='staff'){
//            dd(1);
                $user_find->roles()->attach(Roles::where('name', 'staff')->first());
                $user_find->account = 'staff';
                $user_find->save();
            }
            return redirect()->route('admin.index')->with('success', 'Cấp quyền thành công!');
        }
        else{
            return redirect()->back()->with('error', 'Mật khẩu admin chưa đúng, bạn vui lòng nhập lại!');
        }

    }


    public function show($id)
    {
        $user = Auth::guard('web')->user();
        $userList = User::all();
        $user_show = User::find($id);
        return view('admin.users.show', compact('user', 'user_show', 'userList'));
    }

    public function edit($id)
    {
        $user = Auth::guard('web')->user();
        $user_list = User::all();
        $user_edit = User::find($id);
        return view('admin.users.edit', compact('user', 'user_edit', 'user_list'));
    }

    public function update_account(Request $request, $id)
    {
//        dd($request->all());
        $user = Auth::guard('web')->user();
        {
            $validated_data = $request->validate([
                'name' => 'required',
                'email' => 'required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('admins')->ignore($id),
                'phone' => 'required', 'string', 'phone','between: 10,12', \Illuminate\Validation\Rule::unique('admins')->ignore($id),
                'sex' => 'required',
                'account' => 'required',
                'address' => 'required',
                'birthday' => 'required'
            ]);

            $user = User::find($id);
            $user->name = $validated_data['name'];
            $user->email = $validated_data['email'];
            $user->phone = $validated_data['phone'];
            $user->sex = $validated_data['sex'];
            $user->account = $validated_data['account'];
            $user->address = $validated_data['address'];
            $user->birthday = $validated_data['birthday'];

            if($request->hasFile('avatar')){
                $filename = time().'.'.request()->avatar->getClientOriginalExtension();
                request()->avatar->move(public_path('images'), $filename);
//            dd($filename);
                $user->avatar = $filename;
            }

            $user->save();

            return redirect()->route('admin.index')->with('success', 'Sửa thông tin tài khoản thành công!');
        }
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('web')->user();
        {
            $validated_data = $request->validate([
                'name' => 'required',
//                'email' => 'required|email|exists:admins,email,'.$id,
                'email' => 'required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($id),
                'phone' => 'nullable'
            ]);

            $user = User::find($id);
            $user->name = $validated_data['name'];
            $user->email = $validated_data['email'];
            $user->phone = $validated_data['phone'];
            $user->save();

            return redirect()->route('admin.index')->with('success', 'Sửa thông tin tài khoản thành công!');
        }
    }
    public function logout()
    {
        Session::forget('user_id');
        Session::flush();
        Auth::guard('web')->logout();
        return redirect()->route('admin.login');
    }

    public function edit_password($id)
    {
        $user = Auth::guard('web')->user();
        $user_list = User::all();
        $user_edit = User::find($id);
        return view('admin.users.password', compact('user', 'user_edit', 'user_list'));
    }

    public function change_password(Request $request) {
        $user = Auth::guard('web')->user();
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
        $user = Auth::guard('web')->user();
        $user_list = User::all();
        $user_lock = User::find($id);

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
