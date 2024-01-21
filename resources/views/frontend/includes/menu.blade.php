    <!-- top panel start -->
    {{-- <div class="top-panel-adv">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10">
                    <div class="panel-left-content">
                        <h4 class="mb-0">Welcome to Multikart!! Delivery in <span>10 Minutes.</span> </h4>
                        <div class="delivery-area d-md-block d-none">
                            <div>
                                <h5>Limited Time offer</h5>
                                <h4>code: 25FsfuABdS</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <a href="javascript:void(0)" class="close-btn"><i data-feather="x"></i></a>
                </div>
            </div>
        </div> --}}
    {{-- </div> --}}
    <!-- top panel end -->


    <!-- header start -->
    <header id="sticky-header" class="style-light header-compact">
        <div class="mobile-fix-option"></div>

        <!-- header first part -->
        <div class="top-header top-header-theme">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Welcome to Our store Multikart</li>
                                <li><a href="become-vendor.html" class="text-white fw-bold">Become a Vendor</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end">
                        <ul class="header-dropdown">
                            <li class="mobile-wishlist pe-0">
                                <a href="#"><i class="fa fa-heart" aria-hidden="true"></i>
                                </a>
                            </li>


                            @if ( Auth::check() )
                                <li class="onhover-dropdown mobile-account">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->name }}
                                    <ul class="onhover-show-div">
                                        <li>
                                            <a href="">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="">Profile</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    <i class='bx bx-log-out-circle'>
                                                    </i><span>Logout</span>
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </li>

                            @else
                                <li class="onhover-dropdown mobile-account">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                     My Account
                                    <ul class="onhover-show-div">
                                        <li>
                                            <a href="{{ asset('user-login') }}">Login</a>
                                        </li>
                                        <li>
                                            <a href="{{ asset('user-register') }}">register</a>
                                        </li>
                                    </ul>
                                </li>

                            @endif
                            

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- header second part -->
        <div class="container">
          <div class="row">
             <div class="col-sm-12">
              <div class="main-menu">
                <div class="menu-left">
                 <div class="brand-logo">
                    <a href="index.html"><img src="{{ asset('frontend/assets/images/icon/logo/37.png') }}" class="img-fluid blur-up lazyload" alt=""></a>
                 </div>
                </div>

                <div>
                    <form class="form_search" role="form">
                        <input id="query search-autocomplete" type="search"
                            placeholder="Search any Device or Gadgetsfrontend." class="nav-search nav-search-field"
                            aria-expanded="true">
                        <button type="submit" name="nav-submit-button" class="btn-search">
                            <i class="ti-search"></i>
                        </button>
                    </form>
                </div>

                <div class="menu-right pull-right">
                  <div>
                    <div class="icon-nav">
                      <ul>
                        <li class="onhover-div mobile-search d-xl-none d-inline-block">
                            <div><img src="{{ asset('frontend/assets/images/icon/search.png') }}" onclick="openSearch()"
                                    class="img-fluid blur-up lazyload" alt=""><i class="ti-search"
                                    onclick="openSearch()"></i></div>
                            <div id="search-overlay" class="search-overlay">
                                <div><span class="closebtn" onclick="closeSearch()"
                                        title="Close Overlay">×</span>
                                    <div class="overlay-content">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <form>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                id="exampleInputPassword1"
                                                                placeholder="Search a Product">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary"><i
                                                                class="fa fa-search"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="onhover-div mobile-setting">
                            <div><img src="{{ asset('frontend/assets/images/icon/setting.png') }}"
                                    class="img-fluid blur-up lazyload" alt=""><i
                                    class="ti-settings"></i></div>
                            <div class="show-div setting">
                                <h6>language</h6>
                                <ul>
                                    <li><a href="#">english</a></li>
                                    <li><a href="#">french</a></li>
                                </ul>
                                <h6>currency</h6>
                                <ul class="list-inline">
                                    <li><a href="#">euro</a></li>
                                    <li><a href="#">rupees</a></li>
                                    <li><a href="#">pound</a></li>
                                    <li><a href="#">doller</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="onhover-div mobile-cart">
                            <div>
                                <img src="{{ asset('frontend/assets/images/icon/cart.png') }}" class="img-fluid blur-up lazyload"><i class="ti-shopping-cart"></i>
                            </div>
                            <span class="cart_qty_cls">{{ App\Models\Cart::totalItems() }}</span>

                            <!-- cart items amount show -->
                            @if ( App\Models\Cart::totalItems() > 0 )
                            <ul class="show-div shopping-cart">
                                @foreach ( App\Models\Cart::totalCart() as $cart )
                                    <li>
                                        <div class="media">
                                            <a href="#">
                                                <img class="me-3" src="{{ asset('frontend/assets/images/fashion/product/1.jpg') }} ">
                                            </a>
                                            <div class="media-body">
                                                <a href="#">
                                                 {{-- <h4>
                                                   @foreach ( App\Models\Product::where('id', $cart->product_id)->where('status', 1)->get() as $cartName)
                                                      {{ $cartName->title }}
                                                   @endforeach
                                                </h4> OR --}} 
                                                <h4>{{ $cart->Product->title }}</h4>
                                                </a>
                                                <h4><span>
                                                    @if ( !is_null($cart->product->offer_price) )
                                                      {{ $cart->product_quantity }} Pcs x ৳{{ $cart->product->offer_price }}
                                                    @else
                                                      {{ $cart->product_quantity }} Pcs x ৳{{ $cart->product->regular_price }}
                                                    @endif
                                                </span></h4>
                                            </div>
                                        </div>

                                        <div class="close-circle">
                                            <a href="{{ route('cart.destroy', $cart->id) }}">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                                <li>
                                    <div class="total">
                                        <h5>subtotal : <span>
                                            ৳ {{ App\Models\Cart::totalAmount() }}    
                                        </span></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="buttons">
                                        <a href="{{ route('cart.manage') }}" class="view-cart">view cart</a>
                                        <a href="{{ route('checkout') }}" class="checkout">checkout</a>
                                    </div>
                                </li>
                            </ul>
                            @else
                              <ul class="show-div shopping-cart">
                                 <div class="alert bg-warning">Sorry ! No item added in your cart </div>
                              </ul>
                            @endif
                            <!-- cart items amount show -->

                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- header third part -->
        <div class="bottom-part bottom-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 menu-row">
                        <div data-bs-toggle="modal" data-bs-target="#deliveryarea" class="delivery-area d-md-flex d-none">
                            <i data-feather="map-pin"></i>
                            <div>
                                <h6>Delivery to</h6>
                                <h5>400520</h5>
                            </div>
                        </div>

                        <div class="main-nav-center">
                            <nav id="main-nav" class="text-start">
                                <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                                aria-hidden="true"></i></div>
                                    </li>

                                    <li>
                                        <a href="{{ route('homepage') }}">Home</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('allProduct') }}">All Products</a>
                                    </li>
                                    {{-- <li class="mega" id="hover-cls">
                                        <ul class="mega-menu full-mega-menu">
                                            <li>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>invoice template</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a target="_blank"
                                                                                href="invoice-1.html">invoice
                                                                                1</a></li>
                                                                        <li><a target="_blank"
                                                                                href="invoice-2.html">invoice
                                                                                2</a></li>
                                                                        <li><a target="_blank"
                                                                                href="invoice-3.html">invoice
                                                                                3</a></li>
                                                                        <li><a target="_blank"
                                                                                href="invoice-4.html">invoice
                                                                                4</a></li>
                                                                        <li><a target="_blank"
                                                                                href="invoice-5.html">invoice
                                                                                5</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu-title mt-2">
                                                                    <h5>elements</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="elements.html">
                                                                                elements page<i
                                                                                    class="ms-2 fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i>
                                                                            </a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>email template</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/welcome.html">welcome</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/new-product-announcement.html">announcement</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/abandonment-email.html">abandonment</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/offer.html">offer</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/offer-2.html">offer
                                                                                2</a></li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/product-review.html">review</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/featured-products.html">featured
                                                                                product</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>email template</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/black-friday.html">black
                                                                                friday</a></li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/christmas.html">christmas</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/cyber-monday.html">cyber-monday</a>
                                                                        </li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/flash-sale.html">flash
                                                                                sale</a></li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/email-order-success.html">order
                                                                                success</a></li>
                                                                        <li><a target="_blank"
                                                                                href="frontend/email-template/email-order-success-two.html">order
                                                                                success 2</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>cookie bar</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="index.html">bottom<i
                                                                                    class="ms-2 fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i></a></li>
                                                                        <li><a href="fashion-4.html">bottom left</a>
                                                                        </li>
                                                                        <li><a href="bicycle.html">bottom right</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="menu-title mt-2">
                                                                    <h5>search</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="marketplace-demo-2.html">ajax
                                                                                search<i
                                                                                    class="ms-2 fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>model</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="index.html">Newsletter</a></li>
                                                                        <li><a href="index.html">exit<i
                                                                                    class="ms-2 fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i></a></li>
                                                                        <li><a href="christmas.html">christmas</a>
                                                                        </li>
                                                                        <li><a href="furniture-3.html">black
                                                                                friday</a></li>
                                                                        <li><a href="fashion-4.html">cyber
                                                                                monday</a></li>
                                                                        <li><a href="marketplace-demo-3.html">new
                                                                                year</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>add to cart</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        <li><a href="nursery.html">cart modal
                                                                                popup</a></li>
                                                                        <li><a href="vegetables.html">qty. counter
                                                                                <i class="fa fa-bolt icon-trend"
                                                                                    aria-hidden="true"></i></a></li>
                                                                        <li><a href="bags.html">cart top</a></li>
                                                                        <li><a href="shoes.html">cart bottom</a>
                                                                        </li>
                                                                        <li><a href="watch.html">cart left</a></li>
                                                                        <li><a href="tools.html">cart right</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="{{ asset('frontend/assets/images/menu-banner.jpg') }} "
                                                                class="img-fluid mega-img">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    <li>
                                        <a href="{{ route('offerProduct') }}">Offer Products</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('aboutPage') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contactPage') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        {{-- <div class="delivery-area d-xl-flex d-none ms-auto me-0">
                            <div>
                                <h5>Call us: 123-456-7898</h5>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->