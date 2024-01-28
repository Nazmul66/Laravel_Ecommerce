@extends('frontend.layout.template')

@section('title')
   <title>Ecommerce | My Dashboard Page</title>
@endsection

@section('css')

@endsection


@section('body-content')


  <!-- invoice 1 start -->
  <section class="theme-invoice-1 section-b-space">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 m-auto">
          <div class="invoice-wrapper">
            <div class="invoice-header">
              <div class="upper-icon">
                <img src="{{ asset('frontend/assets/images/invoice/invoice.svg') }}" class="img-fluid" alt="">
              </div>
              <div class="row header-content">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/assets/images/icon/logo.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6 text-md-end mt-md-0 mt-4">
                  <h2>invoice</h2>
                  <div class="mt-md-4 mt-3">
                    <h4 class="mb-2">
                        {{ $order->addressLine1 }} {{ $order->addressLine2 }}
                    </h4>
                    <h4 class="mb-0">
                        @foreach ( App\Models\Country::all() as $country)
                            @if ( $country->id == $order->country )
                                {{ $country->name }}
                            @endif
                        @endforeach, 
                        {{ $order->zip_code }}</h4>
                  </div>
                </div>
              </div>
              <div class="detail-bottom">
                <ul>
                  <li><span>issue date :</span><h4> {{ $order->created_at }}</h4></li>
                  <li><span>invoice no :</span><h4> #{{ $order->id }}</h4></li>
                  <li><span>email :</span><h4> {{ $order->email }}</h4></li>
                </ul>
              </div>
            </div>
            <div class="invoice-body table-responsive-md">
              <table class="table table-borderless mb-0">
                <thead>
                  <tr>
                    <th scope="col">#Sl</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  @php $sl = 1; @endphp
                  @foreach ( $carts as $cart )
                    <tr>
                        <th scope="row">{{ $sl }}</th>
                        <td>#{{ $cart->product_id }}</td>
                        <td>৳{{ $cart->product_unit_price }} BDT</td>
                        <td>{{ $cart->product_quantity }} Pcs</td>
                        <td>৳{{ $cart->product_unit_price * $cart->product_quantity }} BDT</td>
                    </tr>
                    @php $sl++; @endphp
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="2"></td>
                    <td class="font-bold text-dark" colspan="2">GRAND TOTAL</td>
                    <td class="font-bold text-theme">৳{{ $order->amount }} BDT</td>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="invoice-footer text-end">
              <div class="authorise-sign">
                <img src="{{ asset('frontend/assets/images/invoice/sign.png') }}" class="img-fluid" alt="sing">
                <span class="line"></span>
                <h6>Authorised Sign</h6>
              </div>
              <div class="buttons">
                <a href="#" class="btn black-btn btn-solid rounded-2 me-2" onclick="window.print();">export as PDF</a>
                <a href="#" class="btn btn-solid rounded-2" onclick="window.print();">print</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- invoice 1 end -->

@endsection


@section('script')

@endsection
