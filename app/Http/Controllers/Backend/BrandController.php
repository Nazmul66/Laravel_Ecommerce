<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

        $request->validate([
            "name" => 'required',
        ],
        [
            "name.required" => "please fill up the field"
        ]
    );

        $brands->name           = $request->name;
        $brands->slug           = Str::slug($request->name);
        $brands->description    = $request->description;
        $brands->status         = $request->status;

        if( $request->file('image') ){
           $manager = new ImageManager(new Driver());
           $image = $request->file('image');
           $img = $manager->read($request->file('image'));
           
           // create images name
           $images = time() . "-brand-." . $image->getClientOriginalExtension();

           // images size set
           $img->resize(80,80);

           // images path location
           $location = public_path("uploads/Brands/" . $images);

           // to set images to their path location
           $img->toJpeg()->save($location);
          
           // added the images data to database
           $brands->image = $images;
        }

        // dd($brands);  
        $brands->save();

        // successful message display 
        $notification = array(
            'message'    => "Added new Brand data",
            'alert-type' => "success"
        );

        return redirect()->route('brand.manage')->with($notification);
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
            $brand->status         = $request->status;

            if( $request->image ){

                if( file_exists("uploads/Brands/" . $brand->image ) == ""){
                    unlink("uploads/Brands/" . $brand->image );
                }
                else if( file_exists("uploads/Brands/" . $brand->image ) ){
                    unlink("uploads/Brands/" . $brand->image );
                }

                $manager = new ImageManager(new Driver());
                $image = $request->file('image');
                $img = $manager->read($request->file('image'));
                
                // create images name
                $images = time() . "-brand-." . $image->getClientOriginalExtension();
     
                $img->resize(80,80);
     
                $location = public_path("uploads/Brands/" . $images);
     
                $img->toJpeg()->save($location);
     
                $brand->image = $images;
            }
            
            // dd($district); 
            $brand->save();

            // successful message display 
            $notification = array(
                'message'    => "Update Brand information successfully",
                'alert-type' => "success"
            );

            return redirect()->route('brand.manage')->with($notification); 
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

            $imagePath = "uploads/Brands/" . $brand->image;

            if (!is_null($brand->image) && file_exists($imagePath)) {
                unlink($imagePath);
            }
            
            $brand->delete();

        $notification = array(
            'message'    => "Delete Brand data",
            'alert-type' => "error"
        );


            return redirect()->route('brand.trash-manager')->with($notification); 
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
