<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.login.index');
    }

    public function test()
    {
        return view('customer.test');
    }
}
