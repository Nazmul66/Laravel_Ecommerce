@extends('backend.layout.template')

@section('page-title')
   <title>Add New Brand | Ecommerce Platform</title>
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
                 <h5 class="mb-0">Add New Brand</h5>
              </div>

              @include('backend.includes.message')

                <div class="mb-3 border p-3 radius-10">
                    <form method="post" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Brand Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter The Brand Name" >
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Description</label>
                          <textarea name="description" rows="5" class="form-control" placeholder="Write description....." value="{{ old('description') }}" required='required'>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Active Status</label>
                            <select class="form-select" name="status" required='required'>
                              <option value="" selected disabled>Please Select the status</option>
                              <option value="1">Active</option>
                              <option value="2">Inactive</option>
                            </select>
                        </div>

                        <div class="mb-3">
                           <label for="formFile" class="form-label">Brand Logo</label>
                           <input class="form-control" name="image" type="file" id="formFile">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Add Brand" />
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