<?php

namespace App\Http\Controllers\Customer;

use App\CareerLevel;
use App\Deadline;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Order;
use App\OrderService;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if( $request->query('status') ){
            $status = Status::where('slug', '=', $request->query('status') )->firstOrFail();

            $orders = Order::where(['user_id' => Auth::user()->id, 'status_id' => $status->id ] )->get();

            $orders_status = Status::where('for', '=', 'order' )->get();

            return view('customer.orders.index', compact('orders', 'orders_status'));
        }

        $orders = Order::where('user_id', '=', Auth::user()->id )->get();

        $orders_status = Status::where('for', '=', 'order' )->get();

        return view('customer.orders.index', compact('orders', 'orders_status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $career_levels = CareerLevel::all();
        $order_services = OrderService::all();
        $deadlines = Deadline::all();

        return view('customer.orders.create', compact('career_levels', 'order_services', 'deadlines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([ "user_id" => auth()->user()->id, "email" => auth()->user()->email ]);

        Order::create($request->all());

        return redirect()->route('customer.orders.index')->withSuccess('Order place successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $role->load('permissions');

        $order = Order::findOrFail($id);

        return view('customer.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
