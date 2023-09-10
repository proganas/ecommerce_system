<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            dd('Cart Is Empty');
        }
        $carts = Cart::all()->where('session_id', '=', $session_id);
        return view('carts.index')->with(compact(['carts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $session_id = $this->generateRandomString();
            Session::put('session_id', $session_id);
        }
        $cart = new Cart;
        $cart->product_id = $request->product_id;
        $cart->price = $request->price;
        $cart->quantity = $request->quantity;
        $cart->order_id = null;
        $cart->session_id = $session_id;

        if ($cart->save()) {
            return redirect()->route('carts.index')->with(['success' => 'Cart added successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to add cart.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            dd('Cart Is Empty');
        }
        $carts = Cart::all()->where('session_id', '=', $session_id);
        return view('carts.edit')->with(compact(['cart', 'carts']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->product_id = $cart->product_id;
        $cart->price = $cart->price;
        $cart->quantity = $cart->quantity;

        if ($cart->save()) {
            return redirect()->route('carts.index')->with(['success' => 'Cart successfully updated.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update cart.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        if ($cart->delete()) {
            return redirect()->back()->with(['success' => 'Cart successfully deleted.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to delete cart.']);
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
