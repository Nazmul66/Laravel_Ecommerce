@extends('backend.layout.template')

@section('css')
    <style>
        th{
            text-align: left;
        }
    </style>
@endsection

@section('page-title')
    <title>Ecommerce | Order List</title>
@endsection


@section('body-content')

    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">eCommerce</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                 <div class="row">
                    <!-- Customer Details -->
                    <div class="col-lg-4">
                        <div class="information-box ">
                            <h5 class="mb-3">Customer Details</h5>

                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody class="table-light">
                                        <tr>
                                            <th>Full Name</th>
                                            <th>{{ $order->name }}</th>
                                        </tr>
     
                                        <tr>
                                             <th>Email</th>
                                             <th>{{ $order->email }}</th>
                                         </tr>
     
                                         <tr>
                                             <th>Phone</th>
                                             <th>{{ $order->phone }}</th>
                                         </tr>
     
                                        <tr>
                                             <th>Address</th>
                                             <th>{{ $order->addressLine1 }} {{ $order->addressLine2 }}</th>
                                         </tr>
     
                                         <tr>
                                             <th>State / Division</th>
                                             <th>
                                                @foreach ( App\Models\State::where('status', 1)->get() as $state)
                                                    @if ( $state->id == $order->division_id )
                                                        {{ $state->name }}   
                                                    @endif
                                                @endforeach
                                             </th>
                                         </tr>
     
                                         <tr>
                                             <th>District</th>
                                             <th>
                                                @foreach ( App\Models\District::where('status', 1)->get() as $district)
                                                    @if ( $district->id == $order->district_id )
                                                        {{ $district->name }}   
                                                    @endif
                                                @endforeach
                                             </th>
                                         </tr>
     
                                         <tr>
                                             <th>Country</th>
                                             <th>
                                                @foreach ( App\Models\Country::where('status', 1)->get() as $country)
                                                    @if ( $country->id == $order->country )
                                                        {{ $country->name }}   
                                                    @endif
                                                @endforeach
                                             </th>
                                         </tr>
     
                                         <tr>
                                             <th>Zip Code</th>
                                             <th>{{ $order->zip_code }}</th>
                                         </tr>
     
                                    </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>

                     <!-- Product Details -->
                     <div class="col-lg-8">
                        <div class="information-box ">
                            <h5 class="mb-3">Product Details - Payment Method
                                @if ( $order->paid_amount == 0 )
                                   ( Cash On Delivery )
                                @else
                                  ( SSL Commerz )
                                @endif
                            </h5>

                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#Sl.</th>
                                            <th>Product Title</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php $sl=1; @endphp
                                        @foreach ($productItems as $item)
                                            <tr>
                                                <td>#{{ $sl }}</td>
                                                <td>
                                                    @foreach ( App\Models\Product::where('status', 1)->get() as $product)
                                                        @if ( $product->id == $item->product_id )
                                                            {{ $product->title }}   
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{ $item->product_unit_price }} BDT</td>
                                                <td>{{ $item->product_quantity }}</td>
                                                <td>{{ $item->product_unit_price * $item->product_quantity }} BDT</td>
                                            </tr>
                                            @php $sl++; @endphp
                                        @endforeach
                                    </tbody>

                                    <tbody>
                                        <tr>
                                            <th colspan="4" style="text-align: right">
                                                Total Amount
                                            </th>
    
                                            <td>
                                                {{ $order->amount }} BDT
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="4" style="text-align: right">
                                                Paid Amount
                                            </th>
    
                                            <td>
                                                {{ $order->paid_amount }} BDT
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="4" style="text-align: right">
                                               Amount to be collected
                                            </th>
    
                                            <td>
                                                {{ $order->amount - $order->paid_amount }} BDT
                                            </td>
                                        </tr>


                                    </tbody>
                                 </table>
                            </div>
                        </div>
                    </div>
                 </div>

                 <div class="row" style="margin-top: 25px;">
                    <!-- Order Status -->
                    <div class="col-lg-4">
                        <div class="information-box ">
                            <h5 class="mb-3">Order Status</h5>

                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody class="table-light">
                                        <tr>
                                            <th>Current Status</th>
                                            <th>
                                                @if ( $order->status == 'Pending' )
                                                    <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                        <i class='bx bxs-circle me-1'></i>Pending
                                                    </div>
                                                @elseif( $order->status == 'Processing' )
                                                    <div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3">
                                                        <i class='bx bxs-circle me-1'></i>Processing
                                                    </div>
                                                @elseif( $order->status == 'Complete' )
                                                    <div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                        <i class='bx bxs-circle align-middle me-1'></i>Complete
                                                    </div>
                                                @elseif( $order->status == 'Canceled' )
                                                    <div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                        <i class='bx bxs-circle align-middle me-1'></i>Canceled
                                                    </div>
                                                @endif
                                            </th>
                                        </tr>
                                    </tbody>
                                    </table>
                            </div>

                            <form method="POST" action="{{ route('order.update', $order->id) }}" class="mt-3">
                                @csrf

                                <input type="hidden" name="emailAddress" value="{{ $order->email }}">
                                <div class="mb-3">
                                    <label for="status">Update Status</label>
                                    <select class="form-control" name="update_status" id="status">
                                        <option value="Pending">Pending</option>
                                        <option value="Processing">Processing</option>
                                        <option value="Complete">Complete</option>
                                        <option value="Canceled">Canceled</option>
                                    </select>
                                </div>

                                <input type="submit" class="btn btn-dark btn-sm" value="Update Status">
                            </form>

                        </div>
                    </div>
                 </div>
               </div>
            </div>
        </div>


    </div>

@endsection


@section('script')

@endsection
