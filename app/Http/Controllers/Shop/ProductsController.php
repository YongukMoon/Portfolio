<?php

namespace App\Http\Controllers\Shop;

use App\Shop\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug='')
    {
        $query=$slug
        ? \App\Shop\Category::whereSlug($slug)->firstOrFail()->products()
        : new \App\Shop\Product;

        $products=$query->latest()->paginate(8);

        return view('shop.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.shop.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $product=\App\Shop\Product::create([
            'category_id'=>$request->input('categories'),
            'title'=>$request->input('title'),
            'price'=>$request->input('price'),
            'stock'=>$request->input('stock'),
        ]);

        if(!$product){
            flash(trans('flash.ProductsController.store_fail'));
            return redirect(route('products.create'));
        }

        flash(trans('flash.ProductsController.store_success'));
        return redirect(route('admin.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('shop.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.shop.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, Product $product)
    {
        $product->update($request->all());

        flash(trans('flash.ProductsController.update_success'));
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([], 201);
    }
}
