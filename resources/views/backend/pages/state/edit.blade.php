@extends('backend.layout.template')

@section('page-title')
   <title>Update State | Ecommerce Platform</title>
@endsection

@section('css')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection



@section('body-content')

<div class="page-content">
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
          <div class="card radius-10 w-100">

            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                 <h5 class="mb-0">Update State Information</h5>
              </div>

                <div class="mb-3 border p-3 radius-10">
                    <form method="post" action="{{ route('state.update', $state->id) }}">
                        
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter The state Name" value="{{ $state->name }}" required='required'>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Country Name</label>
                            <select class="selection form-select" name="country_id" required="required" value="{{ $state->country_id }}">
                              <option selected disabled>Please select the country</option>
                              @foreach ( $countries as $country )
                                  <option value="{{ $country->id }}" @if( $state->country_id == $country->id ) selected @endif>{{ $country->name }}</option>
                              @endforeach
                            </select>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Priority Number</label>
                            <input type="number" class="form-control" name="priority_number" required="required" value="{{ $state->priority_number }}">
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Status</label>
                            <select class="form-select" name="status">
                              <option disabled>Select Status</option>
                              <option value='1' @if( $state->status == 1 ) selected @endif >Active</option>
                              <option value='2' @if( $state->status == 2 ) selected @endif >Inactive</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save changes" />
                    </form>
                </div>

            </div>
          </div>
        </div>
    </div>
</div>

@endsection



@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.selection').select2();
    });
  </script>
@endsection