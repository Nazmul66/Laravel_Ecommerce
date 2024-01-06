@extends('backend.layout.template')

@section('page-title')
   <title>Country add | Ecommerce Platform</title>
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
                 <h5 class="mb-0">Add New Country</h5>
              </div>

                <div class="mb-3 border p-3 radius-10">
                    <form method="post" action="{{ route('country.store') }}">
                        
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter The Country Name" required='required'>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Status</label>
                            <select class="form-select" name="status">
                              <option selected disabled>Select Status</option>
                              <option value="1">Active</option>
                              <option value="2">Inactive</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add Country" />
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