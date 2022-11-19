<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Booking;
use App\Models\Post;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $user = Auth::guard('admin')->user();
        $users = \App\Models\Admin::where('account', 'user')->get()->count();
        $posts = Post::all()->count();
        $rooms = Room::all()->count();
        $bookings = Booking::all()->count();
        return view('admin.dashboard.index', compact('user', 'users', 'posts', 'rooms', 'bookings'));
    }
    public function statistic_order(Request $request)
    {
        $data = '';
        $user = Auth::guard('admin')->user();
        $thoigian = $request->thoigian;
        $subdays = Carbon::now()->subDays(365)->toDateString();
        //xu ly ngay
        if ($thoigian=='1ngay')
        {
            $subdays = Carbon::now()->subDays(1)->toDateString();
        }
        elseif ($thoigian=='7ngay')
        {
            $subdays = Carbon::now()->subDays(7)->toDateString();
        }
        elseif ($thoigian=='30ngay')
        {
            $subdays = Carbon::now()->subDays(30)->toDateString();
        }
        elseif ($thoigian=='365ngay')
        {
            $subdays = Carbon::now()->subDays(365)->toDateString();
        }

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $bookings = Booking::whereBetween('date',[$subdays, $now])->get();

        $num = count($bookings);

        echo $data = $num;

    }


}
