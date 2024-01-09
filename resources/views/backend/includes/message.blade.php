{{-- <!-- Success message -->
@if ( $message = Session::get('successMsg') )
   <div class="alert alert-success" role="alert">
      {{ $message }}
   </div>
@endif

<!-- Warning message -->
@if ( $message = Session::get('warningMsg') )
   <div class="alert alert-success" role="alert">
      {{ $message }}
   </div>
@endif

<!-- Error message -->
@if ( $message = Session::get('errorMsg') )
   <div class="alert alert-success" role="alert">
      {{ $message }}
   </div>
@endif

<!-- Info message -->
@if ( $message = Session::get('infoMsg') )
   <div class="alert alert-success" role="alert">
      {{ $message }}
   </div>
@endif --}}


@if ( $errors->any() )
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif