@extends('backend.layout.template')

@section('page-title')
   <title>Add New Product | Ecommerce Platform</title>
@endsection

@section('css')
   <link href="{{ asset('backend/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />
@endsection



@section('body-content')

<div class="page-content">
    <div class="card">
        <div class="card-body p-4">
          <h5 class="card-title">Add New Product</h5>
            <hr>

            @include('backend.includes.message')
            
            <div class="form-body mt-4">
              <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                <div class="row">

                    @csrf

                  <div class="col-lg-8">
                    <div class="border border-3 p-4 rounded">
                        <div class="mb-3">
                          <label class="form-label">Product Title</label>
                          <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter product title" >
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Short Description</label>
                          <textarea name="short_description" class="form-control" rows="4">{{ old('short_description') }}</textarea>
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Long Description</label>
                          <textarea name="long_description" class="form-control" rows="7">{{ old('long_description') }}</textarea>
                        </div>

                        <div class="mb-3">
                          <label class="file_div" for="fileUploader">
                              {{-- <h2>Upload</h2> --}}
                              <img src="{{ asset('backend/images/Upload_icon.png') }}" alt="" class="img_upload">
                              <h3>Upload Files or <span>Browse</span></h3>
                              <p>Supported formates: JPEG, PNG, JPG</p>
                              <figcaption class="file_name d-none" ></figcaption>
                          </label>
                          <input type="file" name="image" accept=".jpg, .png, .jpeg" class="d-none" id="fileUploader">
                        </div>

                        <div class="border border-2 p-4 rounded">
                              <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Product image upload 1</label>
                                <input class="form-control" name="multipleImage[]" type="file" id="formFileMultiple" accept=".jpg, .png, .jpeg" multiple>
                              </div>

                              <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Product image upload 2</label>
                                <input class="form-control" name="multipleImage[]" type="file" id="formFileMultiple" accept=".jpg, .png, .jpeg" multiple>
                              </div>

                              <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Product image upload 3</label>
                                <input class="form-control" name="multipleImage[]" type="file" id="formFileMultiple" accept=".jpg, .png, .jpeg" multiple>
                              </div>
                        </div>
                    </div>
                  </div>

                  <div class="col-lg-4">
                    <div class="border border-3 p-4 rounded">
                        <div class="row g-3">
                          <div class="col-12">
                            <label class="form-label">Select Brand</label>
                            <select class="form-select" name="brand_id" value="{{ old('brand_id') }}" >
                              <option value="" selected disabled>Please select the Brand Name</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                          </div>

                          <div class="col-12">
                            <label class="form-label">Select Parent Category </label>
                            <select id="category_id" class="form-select" name="category_id">
                              <option value="" selected disabled>Please select Parent Category</option>
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                          </div>

                          <div class="col-12">
                            <label class="form-label">Select Sub Category </label>
                            <select id="subCategory_id" class="form-select" name="subCategory_id">
                              <option value="" selected disabled>Please select Sub Category</option>
                                @foreach ( $subCats as $subCat )
                                    <option value="{{ $subCat->id }}">{{ $subCat->name }}</option>
                                @endforeach
                            </select>
                          </div>

                          <div class="col-md-6">
                              <label class="form-label">Regular Price</label>
                              <input type="text" name="regular_price" value="{{ old('regular_price') }}" class="form-control"  placeholder="00.00">
                          </div>

                          <div class="col-md-6">
                              <label class="form-label">Offer Price</label>
                              <input type="text" name="offer_price" value="{{ old('offer_price') }}" class="form-control"  placeholder="00.00">
                          </div>

                          <div class="col-md-6">
                              <label class="form-label">SKU Code</label>
                              <input type="text" name="sku_code" value="{{ old('sku_code') }}" class="form-control" placeholder="sku Code">
                          </div>

                          <div class="col-md-6">
                              <label class="form-label">Quantity</label>
                              <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" placeholder="Quantity">
                          </div>

                          <div class="col-12">
                              <label class="form-label">Youtube video Link</label>
                              <input type="text" name="video_link" value="{{ old('video_link') }}" class="form-control">
                          </div>

                          <div class="col-12">
                              <label class="form-label">Is Featured</label>
                              <select class="form-select" name="is_featured" value="{{ old('is_featured') }}">
                                <option value="" selected disabled>Please select the Featured Status</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                          </div>

                          <div class="mb-3">
                            <label class="form-label">Active Status</label>
                              <select class="form-select" name="status" value="{{ old('status') }}" required='required'>
                                <option value="" selected disabled>Please Select the status</option>
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                              </select>
                          </div>

                          <div class="col-12">
                              <label for="inputProductTags" class="form-label">Product Tags</label>
                              <input type="text" name="tags" value="{{ old('tags') }}" class="form-control" id="inputProductTags" placeholder="Enter Product Tags">
                          </div>

                          <div class="col-12">
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Save Product" />
                            </div>
                          </div>
                        </div> 
                    </div>
                  </div>
                </div>
              </form>
                <!--end row-->
        </div>
      </div>
    </div>
</div>

@endsection



@section('script')
   
<script>
const fileUploader = document.querySelector('#fileUploader');
const fileNameElement = document.querySelector('.file_name');

fileUploader.addEventListener('change', (e) => {
    const fileName = e.target.files[0].name;
    console.log(e.target.files[0]);
    fileNameElement.textContent = fileName;
    fileNameElement.classList.remove('d-none');
});
</script>

<script type="text/javascript">

    $('#category_id').change(function() {
          var categoryId = $('#category_id').val();

          //  alert(categoryId); or console.log(categoryId);
          var option = "";

        if(categoryId != 0 && categoryId != ""){
          $.get("http://127.0.0.1:8000/api/get-subCat/" + categoryId, function(data){
              var dataElement = JSON.parse(data);
              // console.log(dataElement);

              if( dataElement.length >= 1 ){
                  dataElement.forEach(function( element ){
                    option += "<option value='" + element.id + "'>" + element.name + "</option>";
                  });
                  $("#subCategory_id").html(option);
              }
              else{
                $("#subCategory_id").html("<option>Sub Category not avilable</option>");
              }
          })
        }


       // 2nd way to fetch api data using jquery ajax 
      //  $.get("http://127.0.0.1:8000/api/get-subCat/" + categoryId, function(data){
      //      var dataElement = JSON.parse(data);
      //      console.log(dataElement);

      //      $("#subCategory_id").empty();
      //      dataElement.forEach(function( element ){
      //         $("#subCategory_id").append("<option value='" + element.id + "'>" + element.name + "</option>");
      //      });
      //   })
    })

</script>

@endsection