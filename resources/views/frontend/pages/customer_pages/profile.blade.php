@extends('frontend.layout.template')

@section('title')
   <title>Ecommerce | My Dashboard Page</title>
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
                        <h2>profile</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- personal deatail section start -->
    <section class="contact-page register-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>PERSONAL DETAIL</h3>
                    <form method="POST" action="{{ route('userInfo.update', Auth::user()->id) }}" class="theme-form">
                        @csrf
                        <div class="form-row row">
                            <div class="col-md-4">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your name" value="{{ Auth::user()->name }}" required="">
                            </div>
                            
                            <div class="col-md-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ Auth::user()->email }}" required="">
                            </div>

                            <div class="col-md-4">
                                <label for="phone">Phone number</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter your number" value="@if( !is_null(Auth::user()->phone) ) {{ Auth::user()->phone }} @else {{ old('phone') }} @endif" required="">
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-sm btn-solid" type="submit">Save setting</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- address section start -->
    <section class="contact-page register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>SHIPPING ADDRESS</h3>
                     <form method="POST" action="{{ route('shippingInfo.update', Auth::user()->id) }}" class="theme-form">
                        @csrf
                        <div class="form-row row">
                            <div class="col-md-4">
                                <label for="addressLine1">Address Line 1</label>
                                <input type="text" name="address_line1" class="form-control" id="addressLine1" placeholder="Enter your number" value="@if( !is_null(Auth::user()->address_line1) ) {{ Auth::user()->address_line1 }} @else {{ old('addressLine1') }} @endif" >
                            </div>

                            <div class="col-md-4">
                                <label for="addressLine2">Address Line 2</label>
                                <input type="text" name="address_line2" class="form-control" id="addressLine2" placeholder="Enter your number" value="@if( !is_null(Auth::user()->address_line2) ) {{ Auth::user()->address_line2 }} @else {{ old('addressLine2') }} @endif" >
                            </div>

                            <div class="col-md-4">
                                <label for="Division">Division</label>
                                <select class="form-select" id="Division" name="division_id" style="height: 53px">
                                    <option value="" selected>Please select the Division</option>
                                    @foreach ($states as $state)
                                       <option value="{{ $state->id }}" 
                                        @if( Auth::user()->division_id == $state->id ) selected @endif>{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="District">State / District</label>
                                <select class="form-select" name="district_id" id="District" style="height: 53px">
                                    <option value="" selected>Please select the State / District</option>
                                    @foreach ($districts as $district)
                                       <option value="{{ $district->id }}" @if( Auth::user()->district_id == $district->id ) selected @endif>{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="Country">Country</label>
                                <select class="form-select" name="country_id" id="Country" style="height: 53px">
                                    <option value="" selected>Please select the Country</option>
                                    @foreach ($countries as $country)
                                       <option value="{{ $country->id }}" @if( Auth::user()->country_id == $country->id ) selected @endif>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="zipCode">Zip Code</label>
                                <input type="text" name="zipCode" class="form-control" id="zipCode" placeholder="zip code" value="@if( !is_null(Auth::user()->zipCode) ) {{ Auth::user()->zipCode }} @else {{ old('zipCode') }} @endif" required="">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-sm btn-solid">Save setting</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->



@endsection


@section('script')

@endsection