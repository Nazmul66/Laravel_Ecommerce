<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $brands = Brand::orderBy('name', 'asc')->where('status', '=' , '1')->get();
        return view('backend.pages.brand.manage', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brands = new Brand();
        $brands->name           = $request->name;
        $brands->slug           = Str::slug($request->name);
        $brands->description    = $request->description;
        // $brands->image          = $request->image;
        $brands->status         = $request->status;

        // dd($brands);  
        $brands->save();
        return redirect()->route('brand.manage');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        
        if( !is_null($brand) ){
            return view('backend.pages.brand.edit', compact('brand'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        
        if( !is_null($brand) ){
            $brand->name           = $request->name;
            $brand->slug           = Str::slug($request->name);
            $brand->description    = $request->description;
            // $brands->image          = $request->image;
            $brand->status         = $request->status;
            
            // dd($district); 
            $brand->save();
            return redirect()->route('brand.manage'); 
        }
    }


    public function trashManager()
    {
        $brands = Brand::orderBy('name', 'asc')->where('status', '=' , '2')->get();
        return view('backend.pages.brand.trash-manage', compact("brands"));
    }


    public function trash(string $id)
    {
        $brand = Brand::find($id);
        if( !is_null($brand) ){
            $brand->delete();

            return redirect()->route('brand.trash-manager'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if( !is_null($brand) ){
            $brand->status = 2;
            $brand->save();

            return redirect()->route('brand.manage'); 
        }
    }
}
