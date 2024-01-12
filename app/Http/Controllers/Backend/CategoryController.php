<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
        $category->status           = $request->status;

        if( $request->file('image') ){
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $img = $manager->read($request->file('image'));
            
            // create images name
            $images = time() . "-category-." . $image->getClientOriginalExtension();
 
            $img->resize(80,80);
 
            $location = public_path("uploads/categories/" . $images);
 
            $img->toJpeg()->save($location);
 
            $category->image = $images;
         }

        // dd($category);  
        $category->save();

        // successful message display 
        $notification = array(
            'message'    => "Added new category data",
            'alert-type' => "success"
        );

        return redirect()->route('category.manage')->with($notification);
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
        $category->status           = $request->status;

        if( $request->image ){

            if( !is_null($category->image) && file_exists("uploads/categories/" . $category->image ) ){
                unlink("uploads/categories/" . $category->image );
            }

            $manager = new ImageManager(new Driver());
            $image = $request->file('image');
            $img = $manager->read($request->file('image'));
            
            // create images name
            $images = time() . "-category-." . $image->getClientOriginalExtension();
 
            $img->resize(80,80);
 
            $location = public_path("uploads/categories/" . $images);
 
            $img->toJpeg()->save($location);
 
            $category->image = $images;
        }
        

        // dd($category);  
        $category->save();

        // successful message display 
        $notification = array(
            'message'    => "Update category information successfully",
            'alert-type' => "success"
        );

        return redirect()->route('category.manage')->with($notification);

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

            // subCat delete data
            foreach( $subCats as $subCat ) {
                $SubImagePath = "uploads/sub_categories/" . $subCat->image;

                if (!is_null($subCat->image) && file_exists($SubImagePath)) {
                    unlink($SubImagePath);
                }
                $subCat->delete();
            }

            $imagePath = "uploads/categories/" . $category->image;
            if (!is_null($category->image) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            $category->delete();


        // delete message display 
        $notification = array(
            'message'    => "Delete category data!",
            'alert-type' => "error"
        );

            return redirect()->route('category.trash-manager')->with($notification); 
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
