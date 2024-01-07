<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    /**
     * Display manage all data.
     */
    public function manage()
    {
        $countries = Country::orderBy("name", "asc")->where('status','=','1')->get();
        return view('backend.pages.country.manage', compact("countries"));
    }

    /**
     * Display to create form data.
     */
    public function create()
    {
        return view('backend.pages.country.create');
    }

    /**
     * post form data to store url.
     */
    public function store(Request $request)
    {
        $country = new Country();
        $country->name =  $request->name;
        $country->slug = Str::slug($request->name);
        $country->status = $request->status;

        // dd($country);  
        $country->save();
        return redirect()->route('country.manage');
    }

    
    /**
     * Display to edit form data.
     */
    public function edit(string $id)
    {
        $country = Country::find($id);
        
        if( !is_null($country) ){
            return view('backend.pages.country.edit', compact('country'));
        }
    }
    
    /**
     * Edit form data to update data 
     */
    public function update(Request $request, string $id)
    {
        $name = $request->name;
        $status  = $request->status;
        $country = Country::find($id);
        
        if( !is_null($country) ){
            $country->name = $name;
            $country->slug = Str::slug($name);
            $country->status = $status;
            
            // dd($country); 
            $country->save();
            return redirect()->route('country.manage'); 
        }
    }

    /**
     * Show all data into trash Management
     */
    public function trashManager()
    {
        $countries = Country::orderBy("name", "asc")->where('status','=','2')->get();
        return view('backend.pages.country.trash-manage', compact("countries"));
    }
    
    /**
     * Permanently delete all data from the form
     */
    public function trash(string $id)
    {
        $country = Country::find($id);
        if( !is_null($country) ){
            $country->delete();

            return redirect()->route('country.trash-manager'); 
        }
    }

    /**
     * update status to changed their country status
     */
    public function destroy(string $id)
    {
        $country = Country::find($id);
        if( !is_null($country) ){
            $country->status = 2;
            $country->save();

            return redirect()->route('country.manage'); 
        }
    }


}
