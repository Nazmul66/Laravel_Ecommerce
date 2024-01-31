@extends('backend.layout.template')

@section('page-title')
   <title>Base Shipping Method | Ecommerce Platform</title>
@endsection

@section('css')
    
@endsection


@section('body-content')

<div class="page-content">
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
          <div class="card radius-10 w-100">

            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                 <h5 class="mb-0">Update Base Shipping Method</h5>
              </div>

                <div class="mb-3 border p-3 radius-10">
                    <form method="post" action="{{ route('shipping.update', $shipping->id) }}">
                        
                        @csrf

                        <div class="row">
                           <div class="col-lg-4">
                              <div class="mb-3">
                                <label class="form-label">Base Location</label>
                                <select name="base_id" class="form-control">
                                    <option value="">Select the best location</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}" @if ( $district->id == $shipping->base_id ) selected @endif>{{ $district->name }}</option>
                                    @endforeach
                                </select>
                              </div>
    
                              <div class="mb-3">
                                <label class="form-label">Base Price</label>
                                <input type="text" name="base_charge" value="{{ $shipping->base_charge }}" class="form-control" placeholder="Base Price" required='required'>
                              </div>
                           </div>

                           <div class="col-lg-4">
                              <div class="mb-3">
                                <label class="form-label">Active Status</label>
                                  <select class="form-select" name="status" required='required'>
                                    <option value="" selected disabled>Please Select the status</option>
                                    <option value="1" @if( $shipping->status == 1 ) selected @endif>Active</option>
                                    <option value="2" @if( $shipping->status == 2 ) selected @endif>Inactive</option>
                                  </select>
                              </div>
                           </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Update Base Location" />
                    </form>
                </div>

            </div>
          </div>
        </div>
    </div>
</div>

@endsection



@section('script')
    
@endsection