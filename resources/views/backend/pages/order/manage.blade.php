@extends('backend.layout.template')

@section('css')
    <link rel="stylesheet" href="style.css">
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

                <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>
                    <div class="ms-auto"><a href="javascript:;" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Order</a></div>
                </div>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Order#</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Order Amount</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">#{{ $order->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>
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
                                </td>
                                <td>{{ $order->amount }} BDT</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('order.edit', $order->id ) }}" class=""><i class='bx bxs-edit'></i></a>
                                        <a href="javascript:;" class="ms-3"><i class='bx bxs-trash'></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

@endsection


@section('script')

@endsection
