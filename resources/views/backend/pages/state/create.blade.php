@extends('backend.layout.template')

@section('page-title')
   <title>Add New State | Ecommerce Platform</title>
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
                 <h5 class="mb-0">Add New State</h5>
              </div>

                <div class="mb-3 border p-3 radius-10">
                    <form method="post" action="{{ route('state.store') }}">
                        
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">State Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter The State Name" required='required'>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Country Name</label>
                            <select class="form-select" name="country_id" required>
                              <option value="" disabled selected>Please select the country</option>
                               @foreach ( $countries as $country )
                                   <option value="{{ $country->id }}">{{ $country->name }}</option>
                               @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Priority Number</label>
                            <input type="number" class="form-control" name="priority_number" required="required">
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Active Status</label>
                            <select class="form-select" name="status" required='required'>
                              <option selected disabled>Please select the Status</option>
                              <option value="1">Active</option>
                              <option value="2">Inactive</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add State" />
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