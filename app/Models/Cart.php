<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'product_quantity',
        'product_unit_price',
        'order_id',
        'ip_address',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public static function totalItems() {
        if( Auth::check() ){
            $carts = Cart::where('user_id', Auth::id())->where("order_id", NULL)->get();
        }
        else{
            $carts = Cart::where('ip_address', request()->ip())->where("order_id", NULL)->get();
        }

        $totalItem = 0;
        foreach( $carts as $cart ){
            $totalItem += $cart->product_quantity;
        }
        return $totalItem;
    }

    public static function totalCart(){
        if( Auth::check() ){
            $carts = Cart::where('user_id', Auth::id())->where("order_id", NULL)->get();
        }
        else{
            $carts = Cart::where('ip_address', request()->ip())->where("order_id", NULL)->get();
        }
        return $carts;
    } 

    public static function totalAmount(){
        if( Auth::check() ){
            $carts = Cart::where('user_id', Auth::id())->where("order_id", NULL)->get();
        }
        else{
            $carts = Cart::where('ip_address', request()->ip())->where("order_id", NULL)->get();
        }

        $totalAmounts = 0;

        foreach( $carts as $cart ){
            if( !is_null( $cart->product->offer_price ) ){
                $totalAmounts += $cart->product_quantity * $cart->product->offer_price;
            }
            else{
                $totalAmounts += $cart->product_quantity * $cart->product->regular_price;
            }
        }
        return $totalAmounts;
    }
}
