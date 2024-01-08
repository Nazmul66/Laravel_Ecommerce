<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $products = Product::orderBy('title', 'asc')->where('status', '=' , '1')->get();
        return view('backend.pages.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands      = Brand::orderBy('name', 'ASC')->where('status', '1')->get();
        $categories  = Category::orderBy('name', 'ASC')->where('is_parent', 0)->where('status', '1')->get();
        return view('backend.pages.product.create', compact("brands", "categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->title             = $request->title;
        $product->slug              = Str::slug($request->title);
        $product->brand_id          = $request->brand_id;
        $product->category_id       = $request->category_id;
        $product->short_details     = $request->short_description;
        $product->long_details      = $request->long_description;
        $product->regular_price	    = $request->regular_price;
        $product->offer_price       = $request->offer_price;
        $product->quantity          = $request->quantity;
        $product->sku_code          = $request->sku_code;
        $product->video_link        = $request->video_link;
        $product->is_featured       = $request->is_featured;
        $product->status            = $request->status;
        $product->tags              = $request->tags;

        dd($product);

        // $product->save();
        // return redirect()->route("product.manage");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
