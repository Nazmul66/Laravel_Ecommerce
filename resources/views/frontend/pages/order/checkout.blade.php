
@extends('frontend.layout.template')

@section('title')
   <title>Ecommerce | Manage cart page</title>
@endsection

@section('css')
    
@endsection

@section('body-content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Check-out</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Check-out</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    
    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form action="{{ route('make.payment') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Billing Details</h3>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Full Name</div>
                                        <input type="text" name="name" 
                                         @if( Auth::check() )
                                            @if ( !is_null( Auth::user()->name ) )
                                               value="{{ Auth::user()->name }}" 
                                            @endif
                                         @else
                                            placeholder="Enter your full name"
                                         @endif
                                            required autocomplete="off" >
                                    </div>

                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Email Address</div>
                                        <input type="text" name="email" 
                                        @if( Auth::check() )
                                            @if ( !is_null( Auth::user()->email ) )
                                            value="{{ Auth::user()->email }}" 
                                            @endif
                                        @else
                                            placeholder="Enter your email address"
                                        @endif
                                        required autocomplete="off" >
                                    </div>

                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">Phone</div>
                                        <input type="text" name="phone" 
                                        @if( Auth::check() )
                                            @if ( !is_null( Auth::user()->phone ) )
                                            value="{{ Auth::user()->phone }}" 
                                            @endif
                                        @else
                                            placeholder="Enter your phone number"
                                        @endif
                                        required autocomplete="off" >
                                    </div>

                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Address Line 1</div>
                                        <input type="text" name="address_line1" 
                                        @if( Auth::check() )
                                            @if ( !is_null( Auth::user()->address_line1 ) )
                                            value="{{ Auth::user()->address_line1 }}" 
                                            @endif
                                        @else
                                            placeholder="Street address"
                                        @endif
                                        required autocomplete="off" >
                                    </div>

                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">Address Line 2 (optional)</div>
                                        <input type="text" name="address_line2" 
                                        @if( Auth::check() )
                                            @if ( !is_null( Auth::user()->address_line2 ) )
                                            value="{{ Auth::user()->address_line2 }}" 
                                            @endif
                                        @else
                                            placeholder="Street address"
                                        @endif
                                        autocomplete="off" >
                                    </div>

                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="field-label">Country</div>
                                        <select name="country_id">
                                            <option>Please select the country</option>
                                            @foreach ($countries as $country)
                                               <option value="{{ $country->id }}"
                                                @if ( Auth::check() )
                                                    @if (Auth::user()->country_id == $country->id)
                                                        selected
                                                    @endif
                                                @endif
                                                >{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">State / Division</div>
                                        <select name="division_id">
                                            <option>Please select the state / division</option>
                                            @foreach ($states as $state)
                                               <option value="{{ $state->id }}"
                                                @if ( Auth::check() )
                                                    @if (Auth::user()->division_id == $state->id)
                                                        selected
                                                    @endif
                                                @endif
                                                >{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <div class="field-label">District / Area</div>
                                        <select name="district_id">
                                            <option>Please select the district / area</option>
                                            @foreach ($districts as $district)
                                               <option value="{{ $district->id }}"
                                                @if ( Auth::check() )
                                                    @if (Auth::user()->district_id == $district->id)
                                                        selected
                                                    @endif
                                                @endif
                                                >{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                        <div class="field-label">Postal / zip Code</div>
                                        <input type="text" name="zipCode" 
                                        @if( Auth::check() )
                                            @if ( !is_null( Auth::user()->zipCode ) )
                                            value="{{ Auth::user()->zipCode }}" 
                                            @endif
                                        @else
                                            placeholder="Enter your email address"
                                        @endif
                                        required autocomplete="off" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Total</span></div>
                                        </div>
                                        <ul class="qty">
                                            @foreach ( App\Models\Cart::totalCart() as $item)
                                              <li>{{ $item->product->title }} × {{ $item->product_quantity }} 

                                                @if ( $item->product->offer_price )
                                                  <span>৳{{ $item->product->offer_price * $item->product_quantity }} BDT</span>
                                                @else
                                                  <span>৳{{ $item->product->regular_price * $item->product_quantity }} BDT</span>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                        <ul class="sub-total">
                                            <li>Subtotal <span class="count">৳{{ App\Models\Cart::totalAmount() }} BDT</span></li>
                                            <li>Shipping
                                                <div class="shipping">
                                                    <div class="shopping-option">
                                                        <input type="checkbox" name="free-shipping" id="free-shipping">
                                                        <label for="free-shipping">Free Shipping</label>
                                                    </div>
                                                    <div class="shopping-option">
                                                        <input type="checkbox" name="local-pickup" id="local-pickup">
                                                        <label for="local-pickup">Local Pickup</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="total">
                                            <li>Total <span class="count">৳620 BDT</span></li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_method" id="payment-2" value="1" required>
                                                            <label for="payment-2">Cash On Delivery<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option paypal">
                                                            <input type="radio" name="payment_method" id="payment-3" value="2" required>
                                                            <label for="payment-3">pay with ssl_Commerz<span class="image">
                                                                <img src="{{ asset('frontend/assets/images/paypal.png') }}" alt=""></span>
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button type="submit" class="btn-solid btn">Place Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
    
@endsection

@section('script')

@endsection