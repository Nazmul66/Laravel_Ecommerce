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
                        <h2>dashboard</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--  dashboard section start -->
    <section class="dashboard-section section-b-space user-dashboard-section">
        <div class="container">
            <div class="row">

                <!-- tabs menu -->
                <div class="col-lg-3">
                    <div class="dashboard-sidebar">
                        <div class="profile-top">
                            <div class="profile-image">
                                <img src="{{ asset('frontend/assets/images/avtar.jpg') }}" alt="" class="img-fluid">
                            </div>
                            <div class="profile-detail">
                                <h5>{{ Auth::user()->name }}</h5>
                                <h6>{{ Auth::user()->email }}</h6>
                            </div>
                        </div>
                        <div class="faq-tab">
                            <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#info"
                                        class="nav-link active">Account Info</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#address"
                                        class="nav-link">Address Book</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#orders"
                                        class="nav-link">My Orders</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#wishlist"
                                        class="nav-link">My Wishlist</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#payment"
                                        class="nav-link">Saved Cards</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#profile"
                                        class="nav-link">Profile</a></li>
                                <li class="nav-item"><a data-bs-toggle="tab" data-bs-target="#security"
                                        class="nav-link">Security</a> </li>
                                <li class="nav-item"><a href="" class="nav-link">Log Out</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- tabs menu -->

                <div class="col-lg-9">
                    <div class="faq-content tab-content" id="top-tabContent">

                        <!-- Account Info -->
                        <div class="tab-pane fade show active" id="info">
                            <div class="counter-section">
                                <div class="welcome-msg">
                                    <h4>Hello, {{ Auth::user()->name }} !</h4>
                                    <p>From your My Account Dashboard you have the ability to view a snapshot of your
                                        recent
                                        account activity and update your account information. Select a link below to
                                        view or
                                        edit information.</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('frontend/assets/images/icon/dashboard/sale.png') }}" class="img-fluid">
                                            <div>
                                                <h3>{{ App\Models\Order::totalOrderQty() }}</h3>
                                                <h5>Total Order</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('frontend/assets/images/icon/dashboard/homework.png') }}" class="img-fluid">
                                            <div>
                                                <h3>
                                                    {{  App\Models\Order::pendingOrderQty() }}
                                                </h3>
                                                <h5>Pending Orders</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="counter-box">
                                            <img src="{{ asset('frontend/assets/images/icon/dashboard/order.png') }}" class="img-fluid">
                                            <div>
                                                <h3>50</h3>
                                                <h5>Wishlist</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-account box-info">
                                    <div class="box-head">
                                        <h4>Account Information</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>Contact Information</h3><a href="{{ route('user-profile') }}">Edit</a>
                                                </div>
                                                <div class="box-content">
                                                    <h6>{{ Auth::user()->name }}</h6>
                                                    <h6>{{ Auth::user()->email }}</h6>
                                                    <h6>{{ Auth::user()->phone }}</h6>
                                                    <h6><a href="{{ route('user-profile') }}">Change Password</a></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box">
                                                <div class="box-title">
                                                    <h3>Newsletters</h3><a href="#">Edit</a>
                                                </div>
                                                <div class="box-content">
                                                    <p>You are currently not subscribed to any newsletter.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box mt-3">
                                        <div class="box-title">
                                            <h3>Address Book</h3><a href="{{ route('user-profile') }}">Manage Addresses</a>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h6>Default Billing Address</h6>
                                                <address>
                                                    @if ( !empty( Auth::user()->address_line1 ) )
                                                       {{ Auth::user()->address_line1 }}

                                                        @if (!empty( Auth::user()->address_line2 ))
                                                           {{ Auth::user()->address_line2 }} 
                                                        @endif

                                                        @if (!empty( Auth::user()->division_id ))
                                                           {{ Auth::user()->division_id }} 
                                                        @endif

                                                        @if (!empty( Auth::user()->district_id ))
                                                           {{ Auth::user()->district_id }} 
                                                        @endif

                                                    @else
                                                      You have not set a default billing address.
                                                    @endif
                                                    <br><a href="{{ route('user-profile') }}">Edit Address</a>
                                                </address>
                                            </div>
                                            <div class="col-sm-6">
                                                <h6>Default Shipping Address</h6>
                                                <address>
                                                    @if ( !empty( Auth::user()->address_line1 ) )
                                                       {{ Auth::user()->address_line1 }}

                                                        @if (!empty( Auth::user()->address_line2 ))
                                                           {{ Auth::user()->address_line2 }} 
                                                        @endif

                                                        @if (!empty( Auth::user()->division_id ))
                                                           {{ Auth::user()->division_id }} 
                                                        @endif

                                                        @if (!empty( Auth::user()->district_id ))
                                                           {{ Auth::user()->district_id }} 
                                                        @endif

                                                    @else
                                                      You have not set a default shipping address.
                                                    @endif
                                                    <br><a href="{{ route('user-profile') }}">Edit Address</a>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address Book -->
                        <div class="tab-pane fade" id="address">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Address Book</h3>
                                                <a href="#" class="btn btn-sm btn-solid">+ add new</a>
                                            </div>
                                            <div class="address-book-section">
                                                <div class="row g-4">
                                                    <div class="select-box active col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="top">
                                                                <h6>mark jecno <span>home</span></h6>
                                                            </div>
                                                            <div class="middle">
                                                                <div class="address">
                                                                    <p>549 Sulphur Springs Road</p>
                                                                    <p>Downers Grove, IL</p>
                                                                    <p>60515</p>
                                                                </div>
                                                                <div class="number">
                                                                    <p>mobile: <span>+91 123 - 456 - 7890</span></p>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#edit-address"
                                                                    data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="select-box col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="top">
                                                                <h6>mark jecno <span>office</span></h6>
                                                            </div>
                                                            <div class="middle">
                                                                <div class="address">
                                                                    <p>549 Sulphur Springs Road</p>
                                                                    <p>Downers Grove, IL</p>
                                                                    <p>60515</p>
                                                                </div>
                                                                <div class="number">
                                                                    <p>mobile: <span>+91 123 - 456 - 7890</span></p>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#edit-address"
                                                                    data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- My orders -->
                        <div class="tab-pane fade" id="orders">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">
                                            <div class="top-sec">
                                                <h3>My Orders</h3>
                                            </div>
                                            <div class="table-responsive-xl">
                                                <table class="table cart-table order-table">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">Sl.</th>
                                                            <th scope="col">Order Id</th>
                                                            <th scope="col">image</th>
                                                            <th scope="col">Order Date</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">View</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $sl = 1; @endphp
                                                        @foreach ( $orders as $order )
                                                            <tr>
                                                                <td>{{ $sl }}</td>
                                                                <td>
                                                                    <span class="mt-0">#{{ $order->id }}</span>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0)">
                                                                        <img src="{{ asset('frontend/assets/images/pro3/1.jpg') }}" class="blur-up lazyloaded" alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <span class="fs-6">{{ $order->created_at }}</span>
                                                                </td>
                                                                <td>
                                                                    @if ( $order->status == 'Pending' )
                                                                        <span class="badge rounded-pill bg-warning custom-badge">Pending
                                                                        </span>

                                                                    @elseif( $order->status == 'Processing' )
                                                                        <span class="badge rounded-pill bg-info custom-badge">Processing
                                                                        </span>

                                                                    @elseif( $order->status == 'Complete' )
                                                                    <span class="badge rounded-pill bg-primary custom-badge">Complete</span>

                                                                    @elseif( $order->status == 'Canceled' )
                                                                    <span class="badge rounded-pill bg-danger custom-badge">Canceled</span>
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    <span class="theme-color fs-6">৳{{ $order->amount }} BDT</span>
                                                                </td>

                                                                <td>
                                                                    <a href="{{ route('user-orderDetails', $order->id) }}">
                                                                        <i class="fa fa-eye text-theme"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @php $sl++; @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- My Wishlists -->
                        <div class="tab-pane fade" id="wishlist">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card dashboard-table mt-0">
                                        <div class="card-body table-responsive-sm">
                                            <div class="top-sec">
                                                <h3>My Wishlist</h3>
                                            </div>
                                            <div class="table-responsive-xl">
                                                <table class="table cart-table wishlist-table">
                                                    <thead>
                                                        <tr class="table-head">
                                                            <th scope="col">image</th>
                                                            <th scope="col">Order Id</th>
                                                            <th scope="col">Product Details</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:void(0)">
                                                                    <img src="{{ asset('frontend/assets/images/pro3/1.jpg') }}" class="blur-up lazyloaded" alt="">
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <span class="mt-0">#125021</span>
                                                            </td>
                                                            <td>
                                                                <span>Purple polo tshirt</span>
                                                            </td>
                                                            <td>
                                                                <span class="theme-color fs-6">$49.54</span>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-xs btn-solid">
                                                                    Move to Cart
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Save cards -->
                        <div class="tab-pane fade" id="payment">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="top-sec">
                                                <h3>Saved Cards</h3>
                                                <a href="#" class="btn btn-sm btn-solid">+ add new</a>
                                            </div>
                                            <div class="address-book-section">
                                                <div class="row g-4">
                                                    <div class="select-box active col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="bank-logo">
                                                                <img src="../assets/images/bank-logo.png"
                                                                    class="bank-logo">
                                                                <img src="../assets/images/visa.png"
                                                                    class="network-logo">
                                                            </div>
                                                            <div class="card-number">
                                                                <h6>Card Number</h6>
                                                                <h5>6262 6126 2112 1515</h5>
                                                            </div>
                                                            <div class="name-validity">
                                                                <div class="left">
                                                                    <h6>name on card</h6>
                                                                    <h5>Mark Jecno</h5>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>validity</h6>
                                                                    <h5>XX/XX</h5>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#edit-address"
                                                                    data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="select-box col-xl-4 col-md-6">
                                                        <div class="address-box">
                                                            <div class="bank-logo">
                                                                <img src="../assets/images/bank-logo1.png"
                                                                    class="bank-logo">
                                                                <img src="../assets/images/visa.png"
                                                                    class="network-logo">
                                                            </div>
                                                            <div class="card-number">
                                                                <h6>Card Number</h6>
                                                                <h5>6262 6126 2112 1515</h5>
                                                            </div>
                                                            <div class="name-validity">
                                                                <div class="left">
                                                                    <h6>name on card</h6>
                                                                    <h5>Mark Jecno</h5>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>validity</h6>
                                                                    <h5>XX/XX</h5>
                                                                </div>
                                                            </div>
                                                            <div class="bottom">
                                                                <a href="javascript:void(0)"
                                                                    data-bs-target="#edit-address"
                                                                    data-bs-toggle="modal" class="bottom_btn">edit</a>
                                                                <a href="#" class="bottom_btn">remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- profiles -->
                        <div class="tab-pane fade" id="profile">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>profile</h4>
                                                    <a class="edit-link" href="{{ route('user-profile') }}">edit</a>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Your name</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ Auth::user()->name }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Email address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ Auth::user()->email }}</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Phone Number</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>
                                                                        @if ( !is_null( Auth::user()->phone ))
                                                                        {{ Auth::user()->phone }}
                                                                        @endif
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Country / Region</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>
                                                                        @if ( !is_null( Auth::user()->country_id ))
                                                                        @foreach ($countries as $country)
                                                                            @if ($country->id == Auth::user()
                                                                            ->country_id )
                                                                                {{ $country->name }}
                                                                            @endif
                                                                        @endforeach
                                                                       
                                                                        @endif
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>street address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>
                                                                        @if ( !is_null( Auth::user()->address_line1 ))
                                                                        {{ Auth::user()->address_line1 }},
                                                                            @if ( !is_null( Auth::user()->address_line2 ))
                                                                            {{ Auth::user()->address_line2 }}
                                                                            @endif
                                                                        @endif
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>city/state</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>
                                                                        @if ( !is_null( Auth::user()->district_id ))
                                                                        @foreach ($districts as $district)
                                                                            @if ($district->id == Auth::user()
                                                                            ->district_id )
                                                                                {{ $district->name }}
                                                                            @endif
                                                                        @endforeach
                                                                        @endif
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>zip</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>
                                                                        @if ( !is_null( Auth::user()->zipCode ))
                                                                        {{ Auth::user()->zipCode }}
                                                                        @endif
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dashboard-title mt-lg-5 mt-3">
                                                    <h4>login details</h4>
                                                    <a class="edit-link" href="{{ route('user-profile') }}">edit</a>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <ul>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Email Address</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>{{ Auth::user()->email }}<a class="edit-link" href="{{ route('user-profile') }}">edit</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Phone No.</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>
                                                                        {{ Auth::user()->phone }}
                                                                    <a class="edit-link" href="{{ route('user-profile') }}">Edit</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="details">
                                                                <div class="left">
                                                                    <h6>Password</h6>
                                                                </div>
                                                                <div class="right">
                                                                    <h6>******* <a class="edit-link" href="{{ route('user-profile') }}">Edit</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Security purpose -->
                        <div class="tab-pane fade" id="security">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mt-0">
                                        <div class="card-body">
                                            <div class="dashboard-box">
                                                <div class="dashboard-title">
                                                    <h4>settings</h4>
                                                </div>
                                                <div class="dashboard-detail">
                                                    <div class="account-setting">
                                                        <h5>Notifications</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios1" value="option1" checked>
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios1">
                                                                        Allow Desktop Notifications
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios2" value="option2">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios2">
                                                                        Enable Notifications
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios3" value="option3">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios3">
                                                                        Get notification for my own activity
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios"
                                                                        id="exampleRadios4" value="option4">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios4">
                                                                        DND
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-setting">
                                                        <h5>deactivate account</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios1"
                                                                        id="exampleRadios4" value="option4" checked>
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios4">
                                                                        I have a privacy concern
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios1"
                                                                        id="exampleRadios5" value="option5">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios5">
                                                                        This is temporary
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios1"
                                                                        id="exampleRadios6" value="option6">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios6">
                                                                        other
                                                                    </label>
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-solid btn-xs">Deactivate
                                                                    Account</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-setting">
                                                        <h5>Delete account</h5>
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios3"
                                                                        id="exampleRadios7" value="option7" checked>
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios7">
                                                                        No longer usable
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios3"
                                                                        id="exampleRadios8" value="option8">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios8">
                                                                        Want to switch on other account
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="radio_animated form-check-input"
                                                                        type="radio" name="exampleRadios3"
                                                                        id="exampleRadios9" value="option9">
                                                                    <label class="form-check-label"
                                                                        for="exampleRadios9">
                                                                        other
                                                                    </label>
                                                                </div>
                                                                <button type="button"
                                                                    class="btn btn-solid btn-xs">Delete Account</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  dashboard section end -->


    <!-- Modal start -->
    <div class="modal logout-modal fade" id="logout" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logging Out</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want to log out?
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-dark btn-custom" data-bs-dismiss="modal">no</a>
                    <a href="index.html" class="btn btn-solid btn-custom">yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->

@endsection


@section('script')

@endsection