<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        // $categories = Category::orderBy('name', 'asc')->where('status', '=' , '1')->get(); 
        $subCats = SubCategory::orderBy('name', 'asc')->where('status', '=' , '1')->get();
        return view('backend.pages.subCategory.manage', compact('subCats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCats = Category::orderBy('name', 'asc')->where('status', '=' , '1')->get();
        return view('backend.pages.subCategory.create', compact('parentCats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subCat = new SubCategory();

        $subCat->name             = $request->name;
        $subCat->slug             = Str::slug($request->name);
        $subCat->description      = $request->description;
        $subCat->category_id      = $request->category_id;
        // $subCat->image         = $request->image;
        $subCat->status           = $request->status;

        // dd($subCat);  
        $subCat->save();

        return redirect()->route('subCategory.manage');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCat = SubCategory::find($id);
        
        if( !is_null( $subCat ) ){
            $parentCats = Category::orderBy('name', 'asc')->where('status', '=' , '1')->get();
            return view('backend.pages.subCategory.edit', compact('subCat', 'parentCats'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subCat = SubCategory::find($id);

        if( !is_null( $subCat ) ){
        $subCat->name             = $request->name;
        $subCat->slug             = Str::slug($request->name);
        $subCat->description      = $request->description;
        $subCat->category_id      = $request->category_id;
        // $category->image         = $request->image;
        $subCat->status           = $request->status;
 
        // dd($category);  
        $subCat->save();

        return redirect()->route('subCategory.manage');
        }
    }


    public function trashManager()
    {
        $subCats = SubCategory::orderBy('name', 'asc')->where('status', '=' , '2')->get();
        return view('backend.pages.subCategory.trash-manage', compact("subCats"));
    }


    public function trash(string $id)
    {
        $subCat = SubCategory::find($id);
        if( !is_null($subCat) ){
            $subCat->delete();

            return redirect()->route('subCategory.trash-manager'); 
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCat = SubCategory::find($id);
        if( !is_null($subCat) ){
            $subCat->status = 2;
            $subCat->save();

            return redirect()->route('subCategory.manage'); 
        }
    }
}
