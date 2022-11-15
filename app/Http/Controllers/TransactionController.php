<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $users = Admin::all();
        $user = Auth::guard('admin')->user();
        $transactions = Payment::paginate(10);
        return view('admin.transaction.index', compact('user', 'transactions', 'users'));

    }

    public  function show($id)
    {
        $user = Auth::guard('admin')->user();
        $transaction = Payment::find($id);
//        dd($transaction->user_id);
        $customer_id = $transaction->user_id;
//        dd($customer_id);
        $customer = Admin::where('id', $customer_id)->get()->first();
//        $room =
//        dd($customer);
        return view('admin.transaction.show', compact('customer', 'transaction', 'user'));

    }
}
