@extends('backend.layout.template')

@section('page-title')
   <title>Update District | Ecommerce Platform</title>
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
                 <h5 class="mb-0">Update District Information</h5>
              </div>

                <div class="mb-3 border p-3 radius-10">
                    <form method="post" action="{{ route('district.update', $district->id) }}">
                        
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter the district name" value="{{ $district->name }}" required='required'>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Name</label>
                            <select class="selection form-select" name="state_id" required>
                                  <option value="" disabled>Please select state name</option>
                                @foreach ($states as $state)
                                  <option value="{{ $state->id }}" @if($state->id == $district->state_id ) selected  @endif >{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Status</label>
                            <select class="form-select" name="status" required='required'>
                              <option value="" disabled>Select Status</option>
                              <option value='1' @if( $district->status == 1 ) selected @endif >Active</option>
                              <option value='2' @if( $district->status == 2 ) selected @endif >Inactive</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Update District" />
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