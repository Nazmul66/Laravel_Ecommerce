@extends('backend.layout.template')

@section('page-title')
   <title>Manage All Sub Category | Ecommerce Platform</title>
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
                 <h5 class="mb-0">All Sub Category List</h5>
                 <a href="{{ route('subCategory.trash-manager') }}" class="btn btn-dark px-5">Trash Folder</a>
              </div>

                <div class="mb-3 border p-3 radius-10">

                    <!-- Manage Table Start -->
                    @if( $subCats->count() == 0)
                        <div class="alert alert-primary" role="alert">
                            Oops! there is no data in our system.
                        </div>                  

                    @else
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Sl.</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Sub Category Name</th>
                                    <th scope="col">Parent Category Name</th>
                                    <th scope="col">Active Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl = 1; @endphp

                                @foreach ( $subCats as $subCat )

                                <tr>
                                    <th scope="row">{{ $sl }}</th>
                                    <td>
                                        @if( !is_null( $subCat->image ) )
                                           <img src="{{ asset('uploads/sub_categories/' . $subCat->image) }}" alt="">
                                        @else
                                        <img src="{{ asset('uploads/ques_mark_product.jpg') }}" alt="" width="80" height="80">
                                        @endif
                                    </td>
                                    <td>{{ $subCat->name }}</td>
                                    <td>{{ $subCat->category->name }}</td> {{-- using eloquent relationship -}}
                                    {{-- <td>
                                       @foreach ($categories as $category)
                                           @if ( $category->id == $subCat->category_id )
                                               {{ $category->name }}
                                           @endif
                                       @endforeach
                                    </td> --}}
                                    <td>
                                        @if( $subCat->status == 1 )
                                        <span class="badge bg-success">Active</span>
                                        @elseif ( $subCat->status == 2 )
                                        <span class="badge bg-danger">InActive</span>
                                        @endif
                                    </td>
                                      <td>
                                        <a href="{{ route('subCategory.edit', $subCat->id) }}" class="btn btn-primary">
                                            <i class="lni lni-pencil-alt"></i>
                                        </a>
                                        <button class="btn btn-danger">
                                            <i class="lni lni-trash" data-bs-toggle="modal" data-bs-target="#subCategory{{ $subCat->id }}"></i>
                                        </button>
                                      </td>
                                   </tr>


                                 <!-- Modal -->
                                <div class="modal fade" id="subCategory{{ $subCat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                     <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Do you want to delete this data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body d-flex justify-content-center mb-3 mt-3">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button> 
                                            <a href="{{ route('subCategory.destroy', $subCat->id) }}" class="btn btn-danger ms-3">Confirm</a>
                                        </div>
                                     </div>
                                    </div>
                                </div>
                                <!-- Modal -->

                                @php $sl++ @endphp
    
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