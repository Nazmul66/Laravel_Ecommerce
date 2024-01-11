@extends('backend.layout.template')

@section('page-title')
   <title>Trash list | Ecommerce Platform</title>
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
                 <h5 class="mb-0">Sub Category trash data</h5>
                 <a href="{{ route('subCategory.manage') }}" class="btn btn-dark px-5">Back to all Manage</a>
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
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Active Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php $sl = 0; @endphp
                                @foreach ( $subCats as $subCat )
                                    @php $sl++ @endphp
                                <tr>
                                    <th scope="row">{{ $sl }}</th>
                                    <td>{{ $subCat->image }}
                                        @if( !is_null($subCat->image) )
                                           <img src="" alt="">
                                        @else
                                          <div class="alert alert-danger" role="alert">
                                             Image not available    
                                          </div>
                                        @endif
                                    </td>
                                    <td>{{ $subCat->name }}</td>
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
                                            <i class="lni lni-trash" data-bs-toggle="modal" data-bs-target="#subCat{{ $subCat->id }}"></i>
                                        </button>
                                    </td>
                                </tr>


                                 <!-- Modal -->
                                <div class="modal fade" id="subCat{{ $subCat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                     <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Do you want to delete Permanently</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body d-flex justify-content-center mb-3 mt-3">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button> 
                                            <a href="{{ route('subCategory.trash', $subCat->id) }}" class="btn btn-danger ms-3">Confirm</a>
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