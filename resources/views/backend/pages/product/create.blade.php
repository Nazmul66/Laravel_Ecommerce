@extends('backend.layout.template')

@section('page-title')
   <title>Add New Product | Ecommerce Platform</title>
@endsection

@section('css')
   <link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />
   <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
@endsection



@section('body-content')

<div class="page-content">

  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
            </ol>
          </nav>
        </div>

        <div class="ms-auto">
          <div class="btn-group">
            <button type="button" class="btn btn-primary">Settings</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
              <a class="dropdown-item" href="javascript:;">Another action</a>
              <a class="dropdown-item" href="javascript:;">Something else here</a>
              <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
          </div>
        </div>
   </div>
  <!--end breadcrumb-->

      <div class="card">
          <div class="card-body p-4">
            <h5 class="card-title">Add New Product</h5>
              <hr>
              <div class="form-body mt-4">
                <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                  <div class="row">

                     @csrf

                    <div class="col-lg-8">
                      <div class="border border-3 p-4 rounded">
                          <div class="mb-3">
                            <label class="form-label">Product Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter product title" required="required">
                          </div>
  
                          <div class="mb-3">
                            <label class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="4"></textarea>
                          </div>
  
                          <div class="mb-3">
                            <label class="form-label">Long Description</label>
                            <textarea name="long_description" class="form-control" rows="7"></textarea>
                          </div>
  
                          <div class="mb-3">
                            <label for="inputProductDescription" class="form-label">Product Images</label>
                            <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple="" style="display: none;"><div class="imageuploadify well"><div class="imageuploadify-overlay"><i class="fa fa-picture-o"></i></div><div class="imageuploadify-images-list text-center"><i class="bx bxs-cloud-upload"></i><span class="imageuploadify-message">Drag&amp;Drop Your File(s)Here To Upload</span><button type="button" class="btn btn-default">or select file to upload</button></div></div>
                          </div>
                      </div>
                    </div>
  
                    <div class="col-lg-4">
                      <div class="border border-3 p-4 rounded">
                          <div class="row g-3">
                            <div class="col-12">
                              <label class="form-label">Select Brand</label>
                              <select class="form-select" name="brand_id">
                                <option value="" selected disabled>Please select the Brand Name</option>
                                 @foreach ($brands as $brand)
                                     <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                 @endforeach
                              </select>
                            </div>

                            <div class="col-12">
                              <label class="form-label">Select Category / Sub Category</label>
                              <select class="form-select" name="category_id">
                                <option value="" selected disabled>Please select Parent / Child Category</option>
                                 @foreach ( $categories as $category )
                                     <option value="{{ $category->id }}">{{ $category->name }}</option>

                                      <!-- sub category option field -->
                                        @foreach ( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $category->id)->where('status', 1 )->get() as $childCat )
                                        <option value="{{ $childCat->id }}">-- {{ $childCat->name }}</option>
                                      <!-- sub category option field -->

                                      @endforeach
                                 @endforeach
                              </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Regular Price</label>
                                <input type="text" name="regular_price" class="form-control"  placeholder="00.00">
                            </div>
  
                            <div class="col-md-6">
                                <label class="form-label">Offer Price</label>
                                <input type="text" name="offer_price" class="form-control"  placeholder="00.00">
                            </div>
  
                            <div class="col-md-6">
                                <label class="form-label">SKU Code</label>
                                <input type="text" name="sku_code" class="form-control" placeholder="sku Code">
                            </div>
  
                            <div class="col-md-6">
                                <label class="form-label">Quantity</label>
                                <input type="text" name="quantity" class="form-control" placeholder="Quantity">
                            </div>
  
                            <div class="col-12">
                                <label class="form-label">Youtube video Link</label>
                                <input type="text" name="video_link" class="form-control">
                            </div>
  
                            <div class="col-12">
                                <label class="form-label">Is Featured</label>
                                <select class="form-select" name="is_featured">
                                  <option value="" selected disabled>Please select the Featured Status</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                              </select>
                            </div>
  
                            <div class="mb-3">
                              <label class="form-label">Active Status</label>
                                <select class="form-select" name="status" required='required'>
                                  <option value="" selected disabled>Please Select the status</option>
                                  <option value="1">Active</option>
                                  <option value="2">Inactive</option>
                                </select>
                            </div>
  
                            <div class="col-12">
                                <label for="inputProductTags" class="form-label">Product Tags</label>
                                <input type="text" name="tags" class="form-control" id="inputProductTags" placeholder="Enter Product Tags">
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
<script src="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#image-uploadify').imageuploadify();
    })
  </script>
@endsection