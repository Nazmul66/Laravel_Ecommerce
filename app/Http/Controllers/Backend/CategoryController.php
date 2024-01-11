<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $categories = Category::orderBy('name', 'asc')->where('status', '=' , '1')->get();
        return view('backend.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();

        $category->name             = $request->name;
        $category->slug             = Str::slug($request->name);
        $category->description      = $request->description;
        // $category->image         = $request->image;
        $category->status           = $request->status;

        // dd($category);  
        $category->save();
        return redirect()->route('category.manage');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        
        if( !is_null( $category ) ){
            return view('backend.pages.category.edit', compact('category'));
        }
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

       if( !is_null( $category ) ){

        $category->name             = $request->name;
        $category->slug             = Str::slug($request->name);
        $category->description      = $request->description;
        // $category->image         = $request->image;
        $category->status           = $request->status;

        // dd($category);  
        $category->save();
        return redirect()->route('category.manage');

       }
    }


    public function trashManager()
    {
        $categories = Category::orderBy('name', 'asc')->where('status', '=' , '2')->get();
        return view('backend.pages.category.trash-manage', compact("categories"));
    }


    public function trash(string $id)
    {
        $category = Category::find($id);
        if( !is_null($category) ){

            $subCats = SubCategory::orderBy("name", "asc")->where("category_id", $category->id)->get();

            foreach( $subCats as $subCat ) {
                $subCat->delete();
            }

            $category->delete();

            return redirect()->route('category.trash-manager'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if( !is_null($category) ){
            $category->status = 2;
            $category->save();

            return redirect()->route('category.manage'); 
        }
    }
}
