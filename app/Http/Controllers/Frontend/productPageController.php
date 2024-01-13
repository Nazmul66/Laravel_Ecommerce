<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class productPageController extends Controller
{
    /**
     * all product pages
     */
    public function allProducts()
    {
        $products = Product::where('status', 1)->get(); 
        return view('frontend.pages.product.all-products', compact("products"));
    }


    public function categoryProducts(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $subCat   = SubCategory::where('slug', $slug)->first();
        // dd($subCat);

        if( !empty($category->id) ){
            $products = Product::orderBy("id", "desc")->where('category_id', $category->id)->where('status', 1)->get(); 
            return view('frontend.pages.product.all-products', compact('products'));
        }
        else if( !empty($subCat->id) ){
            $products = Product::orderBy("id", "desc")->where('subCategory_id', $subCat->id)->where('status', 1)->get(); 
            return view('frontend.pages.product.all-products', compact('products'));
        }

    }


    public function productDetails(string $slug)
    {
        $productDetails = Product::where("slug", $slug)->first();
        return view('frontend.pages.product.product-details', compact('productDetails'));
    }


    /**
     * offer product pages
     */
    public function offerProducts()
    {
        return view('frontend.pages.product.offer-products');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
