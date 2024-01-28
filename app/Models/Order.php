<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static function totalOrderQty(){
        if( Auth::check() ){
            $orders = Order::where('user_id', Auth::id())->get();
        }

        // $cartsQuantity = Cart::where('order_id', $order->id)->get();
         
        $totalOrderQty = 0;

        foreach($orders as $order){
            foreach( Cart::where('order_id', $order->id)->get() as $cartsQty ){
                $totalOrderQty = $totalOrderQty + $cartsQty->product_quantity;
            }
        }

        return $totalOrderQty;
    } 


    public static function pendingOrderQty(){
        if( Auth::check() ){
            $orders = Order::where('user_id', Auth::id())->where('status', 'Pending')->get();
        }

        // $cartsQuantity = Cart::where('order_id', $order->id)->get();
         
        $pendingOrderQty = 0;

        foreach($orders as $order){
            foreach( Cart::where('order_id', $order->id)->get() as $cartsQty ){
                $pendingOrderQty = $pendingOrderQty + $cartsQty->product_quantity;
            }
        }

        return $pendingOrderQty;
    } 
}
