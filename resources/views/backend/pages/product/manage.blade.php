@extends('backend.layout.template')

@section('page-title')
   <title>Product list | Ecommerce Platform</title>
@endsection

@section('css')
    
@endsection



@section('body-content')

<div class="page-content">
    <div class="row">
        <div class="col-12 col-lg-12 col-xl-12 d-flex">
          <div class="card radius-10 w-100">

            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-3">
                 <h5 class="mb-0">All Product List</h5>
                 <a href="{{ route('product.trash-manager') }}" class="btn btn-dark px-5">Trash Folder</a>
              </div>

                <div class="mb-3 border p-3 radius-10">

                    <!-- Manage Table Start -->
                    @if( $products->count() == 0)
                        <div class="alert alert-primary" role="alert">
                            Oops! there is no data in our system.
                        </div>                  

                    @else
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Sl.</th>
                                    <th scope="col">Product Title</th> 
                                    <th scope="col">Brand</th> 
                                    <th scope="col">Category</th> 
                                    <th scope="col">Sub Category</th> 
                                    <th scope="col">SKU Code</th> 
                                    <th scope="col">Quantity</th> 
                                    <th scope="col">Regular Price</th> 
                                    <th scope="col">Offer Price</th> 
                                    <th scope="col">Featured</th>
                                    <th scope="col">Active Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php $sl = 0; @endphp
                                @foreach ( $products as $product )
                                    @php $sl++ @endphp
                                <tr>
                                    <th scope="row">{{ $sl }}</th>
                                    <td>{{ $product->title }}</td>
                                    <td>
                                       @foreach ($brands as $brand)
                                          @if ( $product->brand_id == $brand->id )
                                             {{ $brand->name }}
                                          @endif 
                                       @endforeach
                                    </td>
                                    <td>
                                        @foreach ($categories as $category)
                                            @if ( $product->category_id == $category->id )
                                            {{ $category->name }}
                                            @endif 
                                        @endforeach
                                    </td>
                                    <td>
                                       @foreach ($subCats as $subCat)
                                        @if ( $product->subCategory_id == $subCat->id )
                                            {{ $subCat->name }}
                                        @endif   
                                       @endforeach
                                    </td>
                                    <td>{{ $product->sku_code }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->regular_price }}</td>
                                    <td>
                                        @if ( !is_null( $product->offer_price ) )
                                            {{ $product->offer_price }}
                                        @else
                                           <span class="badge rounded-pill bg-warning">-- Not Applied --</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ( $product->is_featured == 1 )
                                          <span class="badge bg-primary">Featured</span>
                                        @else
                                          <span class="badge bg-secondary">-- Not Featured --</span>
                                        @endif
                                    </td>
                                    <td>
                                       @if( $product->status == 1 )
                                        <span class="badge bg-success">Active</span>
                                       @elseif ( $product->status == 2 )
                                         <span class="badge bg-danger">InActive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <button class="btn btn-danger">
                                            <i class="lni lni-trash" data-bs-toggle="modal" data-bs-target="#products{{ $product->id }}"></i>
                                        </button>
                                      </td>
                                </tr>


                                 <!-- Modal -->
                                <div class="modal fade" id="products{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                     <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Do you want to delete this data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body d-flex justify-content-center mb-3 mt-3">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button> 
                                            <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger ms-3">Confirm</a>
                                        </div>
                                     </div>
                                    </div>
                                </div>
                                <!-- Modal -->
    
                                @endforeach
                            </tbody>
                        </table>

                    @endif

                    <!-- Manage Table end -->

                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection



@section('script')
    
@endsection