<?php

namespace App\Http\Controllers\Customer;

use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        $orders = Order::with('invoice')->where('user_id', Auth::user()->id)->get('status_id');

        $latestOrders = Order::where('user_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->get();

        $data = [
            'totalOrders' => $orders->count(),
            'clearInvoices' =>  $orders->pluck('invoice')->where('status_id', 2)->count(),
            'pendingInvoices' => $orders->pluck('invoice')->where('status_id', 4)->count(),
        ];

        return view('customer.home', compact('data', 'latestOrders'));
    }
}
