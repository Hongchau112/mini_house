<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Psy\Util\Str;

class ForgotPasswordController extends Controller
{
    public function show_forgot_password()
    {
        dd('1');

//        return view('admin.custom_auth.forgot_password');
    }

    public function forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('reset_password')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('admin.custom_auth.sendMail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function show_resetPassword($token) {
        return view('admin.custom_auth.forgotPassword_link', ['token' => $token]);
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('reset_password')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('reset_password')->where(['email'=> $request->email])->delete();

        return redirect('admin.login')->with('message', 'Your password has been changed!');
    }


}
