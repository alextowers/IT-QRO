<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();

        return view('products.index')
            ->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
        
        $product->sku = $request->input('sku');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $request->file('image')->store('images');

        $category = App\Category::find($request->input('category'));
        $product->category()
            ->associate($category);

        $product->save();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto guardado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::find($product);

        return view('products.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::find($product);

        return view('products.edit')
            ->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = Product::find($product);

        $product->sku = $request->input('sku');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->image = $request->file('image')->store('images');

        $category = App\Category::find($request->input('category'));
        $product->category()
            ->associate($category);

        $product->save();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::find($product);
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Producto eliminado satisfactoriamente');
    }
}
