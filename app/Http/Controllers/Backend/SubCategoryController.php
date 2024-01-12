<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


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
        $subCat->status           = $request->status;

        if( $request->file('image') ){
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $img = $manager->read($request->file('image'));
            
            // create images name
            $images = time() . "-sub_categories-." . $image->getClientOriginalExtension();
 
            // images size set
            $img->resize(80,80);
 
            // images path location
            $location = public_path("uploads/sub_categories/" . $images);
 
            // to set images to their path location
            $img->toJpeg()->save($location);
           
            // added the images data to database
            $subCat->image = $images;
         }

        // dd($subCat);  
        $subCat->save();

        // successful message display 
        $notification = array(
            'message'    => "Added new sub category data!",
            'alert-type' => "success"
        );

        return redirect()->route('subCategory.manage')->with($notification);
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
        $subCat->status           = $request->status;

        if( $request->image ){

            if( !is_null($request->image) && file_exists("uploads/sub_categories/" . $subCat->image)){
                unlink("uploads/sub_categories/" . $subCat->image );
            }

            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $img = $manager->read($request->file('image'));
            
            // create images name
            $images = time() . "-brand-." . $image->getClientOriginalExtension();
 
            $img->resize(80,80);
 
            $location = public_path("uploads/Brands/" . $images);
 
            $img->toJpeg()->save($location);
 
            $subCat->image = $images;
        }
 
        // dd($category);  
        $subCat->save();

        // successful message display 
        $notification = array(
            'message'    => "Update Sub Category information successfully",
            'alert-type' => "success"
        );

        return redirect()->route('subCategory.manage')->with($notification);
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

            $imagePath = "uploads/sub_categories/" . $subCat->image;

            if (!is_null($subCat->image) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            $subCat->delete();

            $notification = array(
                'message'    => "Delete sub category data",
                'alert-type' => "error"
            );

            return redirect()->route('subCategory.trash-manager')->with($notification); 
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
