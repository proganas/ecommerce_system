<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        return view('orders.create')->with(compact(['orders']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            dd("You don't have cart");
        }
        $order = new Order;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;

        $carts = Cart::all()->where('session_id', '=', $session_id);
        $total_price = 0;
        foreach ($carts as $cart) {
            $total_price = $total_price + ($cart->quantity) * ($cart->price);
        }
        $order->total_price = $total_price;
        if ($order->save()) {
            $order_id = $order->id;
            foreach ($carts as $cart) {
                $cart->order_id = $order_id;
                $cart->save();
            }
            Session::forget('session_id');
            return redirect()->route('products.shop')->with(['success' => 'Order added successfully.']);
        }
        return redirect()->back()->with(['fail' => 'Unable to add order.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
