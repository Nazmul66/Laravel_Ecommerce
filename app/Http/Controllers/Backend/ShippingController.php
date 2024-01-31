<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Country;
use App\Models\State;
use App\Models\District;


class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $Shippings = Shipping::orderBy('id', 'asc')->where('provider_name', null)->get();
        $couriers = Shipping::orderBy('id', 'asc')->where('base_id', null)->get();
        $districts = District::orderBy('id', 'asc')->get();
        return view('backend.pages.shipping.manage', compact('Shippings', 'districts', 'couriers')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::orderBy('id', 'asc')->get();
        return view('backend.pages.shipping.create', compact('districts')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $base_loc = new Shipping();

        $base_loc->base_id          = $request->base_id;
        $base_loc->base_charge      = $request->base_charge;
        $base_loc->status           = $request->status;

        $base_loc->save();

        // Update message display 
        $notification = array(
            'message'    => "Add location successfully",
            'alert-type' => "success"
        );

        return redirect()->route('shipping.manage')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shipping = Shipping::find($id);

        if( !is_null($shipping) ){
            $districts = District::orderBy('id', 'asc')->get();
            return view('backend.pages.shipping.edit', compact('shipping', 'districts'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shipping = Shipping::find($id);

        if( !is_null($shipping) ){
            $shipping->base_id          = $request->base_id;
            $shipping->base_charge      = $request->base_charge;
            $shipping->status           = $request->status;
    
            $shipping->save();

            // Update message display 
            $notification = array(
                'message'    => "update location successfully",
                'alert-type' => "success"
            );

            return redirect()->route('shipping.manage')->with($notification);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $shipping = Shipping::find($id);

        if( !is_null( $shipping ) ){
            $shipping->delete();

        // Delete message display 
        $notification = array(
            'message'    => "Delete location successfully",
            'alert-type' => "error"
        );

        return redirect()->route('shipping.manage')->with($notification); 
      }
        
    }



     /**************************************************
     ****               Courier Routes 
     **************************************************/

    public function courierCreate()
    {
        $districts = District::orderBy('id', 'asc')->get();
        return view('backend.pages.shipping.courier.create', compact('districts')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function courierStore(Request $request)
    {
        $shipping = new Shipping();

        if( !is_null( $shipping ) ){
            $shipping->provider_name          = $request->provider_name;
            $shipping->provider_charge        = $request->provider_charge;
            $shipping->status                 = $request->status;
    
            $shipping->save();
    
            // Update message display 
            $notification = array(
                'message'    => "Add shipping method successfully",
                'alert-type' => "success"
            );
    
            return redirect()->route('shipping.manage')->with($notification);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function courierEdit(string $id)
    {
        $shipping = Shipping::find($id);

        if( !is_null($shipping) ){
            $districts = District::orderBy('id', 'asc')->get();
            return view('backend.pages.shipping.courier.edit', compact('shipping', 'districts'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function courierUpdate(Request $request, string $id)
    {
        $shipping = Shipping::find($id);

        if( !is_null($shipping) ){
            $shipping->provider_name          = $request->provider_name;
            $shipping->provider_charge        = $request->provider_charge;
            $shipping->status                 = $request->status;
    
            $shipping->save();

            // Update message display 
            $notification = array(
                'message'    => "update shipping method successfully",
                'alert-type' => "success"
            );

            return redirect()->route('shipping.manage')->with($notification);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function courierDestroy(string $id)
    {
        $shipping = Shipping::find($id);

        if( !is_null( $shipping ) ){
            $shipping->delete();

        // Delete message display 
        $notification = array(
            'message'    => "Delete Courier successfully",
            'alert-type' => "error"
        );

        return redirect()->route('shipping.manage')->with($notification); 
      }
        
    }
}
