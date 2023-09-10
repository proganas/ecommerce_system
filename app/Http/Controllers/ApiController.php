<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function latest_products()
    {
        $products['status'] = 200;
        $products['data'] = Product::get()->groupBy('category_id')->toArray();
        $products_json = json_encode($products);
        dd($products_json);
    }

    public function categories($category_id)
    {
        $result = array();
        $category = Category::where('id', '=', $category_id)->first()->toArray();
        $result['category'] = $category;
        $products_category = Product::all()->where('category_id', '=', $category_id)->toArray();
        $result['category']['products'] = $products_category;

        $sub_categories = Category::all()->where('parent_id', '=', $category_id)->toArray();
        $result['sub_categories'] = $sub_categories;
        foreach ($result['sub_categories'] as $key => $value) {
            $result['sub_categories'][$key]['products'] = Product::all()->where('category_id', '=', $value['id'])->toArray();
        }

        $result_json = json_encode($result);
        dd($result_json);
    }

    public function order_product()
    {
        return view('apis.order_product');
    }

    public function order_ajax(Request $request)
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
            return response()->json(['success' => 'Done!']);
        }
        return response()->json(['error' => 'Unable to add order!']);
    }
}
