<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $subCats  = SubCategory::orderBy('name', 'ASC')->where('status', '1')->get();
        $products = Product::orderBy('title', 'asc')->where('status', '=' , '1')->get();
        return view('backend.pages.product.manage', compact('products','subCats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands       = Brand::orderBy('name', 'ASC')->where('status', '1')->get();
        $categories   = Category::orderBy('name', 'ASC')->where('status', '1')->get();
        $subCats      = SubCategory::orderBy('name', 'ASC')->where('status', '1')->get();
        return view('backend.pages.product.create', compact("brands", "categories", "subCats"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();

        // 1st way integrate validate system
        $request->validate([
            'title'              => 'required',
            'brand_id'           => 'required',
            'category_id'        => 'required',
            'subCategory_id'     => 'required',
            'short_description'  => 'required',
            'regular_price'      => 'required',
            'quantity'           => 'required',
        ],
        [
            'title.required'      => "Product title are not set",
            // 'title.unique'        => "Product title should be unique",
            'quantity.required'   => "Product quantity must be added",
        ]
    );

        // 2nd way integrate validate system
        // $this->validate($request, [      
        //     'title'             => 'required',
        //     'brand_id'          => 'required',
        //     'category_id'       => 'required',
        //     'short_description' => 'required',
        //     'regular_price'     => 'required',
        //     'quantity'          => 'required',
        // ]);

        $product->title             = $request->title;
        $product->slug              = Str::slug($request->title);
        $product->brand_id          = $request->brand_id;
        $product->category_id       = $request->category_id;
        $product->subCategory_id    = $request->subCategory_id;
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

        // dd($product);

        $product->save();

        // 1st way flash msg show 
        session::flash('alert-type', 'success');
        session::flash('message', "product has been added");


        // 2nd way flash msg show 
        // $notification = array(
        //     'message'    => "product has been added",
        //     'alert-type' => "success"
        // );

        // return redirect()->route("product.manage")->with('success', 'Product added successfully');
        // return redirect()->route("product.manage")->with($notification); --> 2nd way flash msg show
        return redirect()->route("product.manage");
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
