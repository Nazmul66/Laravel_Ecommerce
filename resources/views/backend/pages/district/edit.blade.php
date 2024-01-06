@extends('backend.layout.template')

@section('page-title')
   <title>Country edit | Ecommerce Platform</title>
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
                 <h5 class="mb-0">Update Countries</h5>
              </div>

                <div class="mb-3 border p-3 radius-10">
                    <form method="post" action="{{ route('country.update', $country->id) }}">
                        
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter The Country Name" value="{{ $country->name }}" required='required'>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Status</label>
                            <select class="form-select" name="status">
                              <option disabled>Select Status</option>
                              <option value='1' @if( $country->status == 1 ) selected @endif >Active</option>
                              <option value='2' @if( $country->status == 2 ) selected @endif >Inactive</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Update Country" />
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