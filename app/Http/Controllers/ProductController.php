<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.index')->with(compact(['products', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.create')->with(compact(['products', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id ? $request->category_id : 0;

        if ($product->save()) {
            return redirect()->route('products.index')->with(['success' => 'Product added successfully.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to add product.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.edit')->with(compact(['product', 'products', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id ? $request->category_id : 0;

        if ($product->save()) {
            return redirect()->route('products.index')->with(['success' => 'Product successfully updated.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to update product.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->delete()) {
            return redirect()->back()->with(['success' => 'Product successfully deleted.']);
        }

        return redirect()->back()->with(['fail' => 'Unable to delete product.']);
    }

    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.shop')->with(compact(['products', 'categories']));
    }
}
