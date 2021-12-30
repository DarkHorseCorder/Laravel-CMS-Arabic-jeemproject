<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        return view('admin.home');
    }

}
