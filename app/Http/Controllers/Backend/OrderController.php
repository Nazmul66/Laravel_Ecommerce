<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function manage()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.pages.order.manage', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        
        if( !empty($order) ){
            $productItems = Cart::where('order_id', $order->id)->get();
            return view('backend.pages.order.details', compact('order', 'productItems'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        if( !empty($order) ){
            $order->status  =  $request->update_status;

            // Ata email send korar jonno use kora hoye thakbe
            // $adminEmail = 'hnazmul748@gmail.com';
            // $customerEmail =  $request->emailAddress;

            // Sending Mail to the customer, to update the status process of product confirming 
            // if( $order->status === 'Pending' ){
            //     Mail::to($adminEmail)->send( new NewOrderEmail($mailData) );
            //     Mail::to($customerEmail)->send( new NewOrderEmail($mailData) );
            // }
            // else if( $order->status === 'Processing' ){
            //     Mail::to($adminEmail)->send( new NewOrderEmail($mailData) ); 
            //     Mail::to($customerEmail)->send( new NewOrderEmail($mailData) );
            // }
            // else if( $order->status === 'Complete' ){
            //     Mail::to($adminEmail)->send( new NewOrderEmail($mailData) );
            //     Mail::to($customerEmail)->send( new NewOrderEmail($mailData) );
            // }
            // else if( $order->status === 'Canceled' ){
            //     Mail::to($adminEmail)->send( new NewOrderEmail($mailData) );
            //     Mail::to($customerEmail)->send( new NewOrderEmail($mailData) );
            // }

            $order->save();
        }

        $notifications = array(
            'message'    => "order status has been updated",
            'alert-type' => "success"
        );

        return redirect()->back()->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
