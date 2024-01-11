@extends('backend.layout.template')

@section('page-title')
   <title>Update Sub Category Information | Ecommerce Platform</title>
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
                 <h5 class="mb-0">Update Sub Category Information</h5>
              </div>

                <div class="mb-3 border p-3 radius-10">
                  <form method="post" action="{{ route('subCategory.update', $subCat->id) }}" enctype="multipart/form-data">
                        
                      @csrf

                      <div class="mb-3">
                          <label class="form-label">Category Name</label>
                          <input type="text" name="name" class="form-control" value="{{ $subCat->name }}" placeholder="Category Name" required='required'>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Parent Category Name</label>
                          <select class="form-select" name="category_id" required='required'>
                            <option value="" selected disabled>Please Select the parent category</option>
                            @foreach ($parentCats as $parentCat)
                              <option value="{{ $parentCat->id }}" @if ( $parentCat->id == $subCat->category_id ) selected @endif>{{ $parentCat->name }}</option>
                            @endforeach
                          </select>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="5" class="form-control" placeholder="Write description....." required='required'>{{ $subCat->description }}</textarea>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Active Status</label>
                          <select class="form-select" name="status" required='required'>
                            <option value="" selected disabled>Please Select the status</option>
                            <option value="1" @if ( $subCat->status == 1 ) selected @endif>Active</option>
                            <option value="2" @if ( $subCat->status == 2 ) selected @endif>Inactive</option>
                          </select>
                      </div>

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Category Logo</label>
                        <input class="form-control" name="image" type="file" id="formFile">
                      </div>

                      <input type="submit" class="btn btn-primary" value="Update Brand" />
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