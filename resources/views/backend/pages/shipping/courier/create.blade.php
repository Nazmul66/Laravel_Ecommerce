@extends('backend.layout.template')

@section('page-title')
   <title>Add Shipping Method | Ecommerce Platform</title>
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
                 <h5 class="mb-0">Add Shipping Method</h5>
              </div>

                <div class="mb-3 border p-3 radius-10">
                    <form method="post" action="{{ route('courier.store') }}">
                        
                        @csrf

                        <div class="row">
                           <div class="col-lg-4">
                              <div class="mb-3">
                                <label class="form-label">Provider Name</label>
                                <input type="text" name="provider_name" class="form-control" placeholder="Provider Name" required='required'>
                              </div>
    
                              <div class="mb-3">
                                <label class="form-label">Provider Charge</label>
                                <input type="text" name="provider_charge" class="form-control" placeholder="Provider Charge" required='required'>
                              </div>
                           </div>

                           <div class="col-lg-4">
                              <div class="mb-3">
                                <label class="form-label">Active Status</label>
                                  <select class="form-select" name="status" required='required'>
                                    <option value="" selected disabled>Please Select the status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                  </select>
                              </div>
                           </div>
                        </div>

                        <input type="submit" class="btn btn-dark" value="Add Shipping Method" />
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