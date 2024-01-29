

<form action="{{ route('cart.store') }}" method="post">

    <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
    @csrf
    
    <!-- price increase and decrease start -->
    <div class="qty-box">
        <div class="input-group mb-3">
            <span class="input-group-prepend">
                <button type="button" class="btn quantity-left-minus" data-type="minus" data-field="">
                <i class="ti-angle-left"></i></button> 
            </span>

            <input type="number" name="product_quantity" class="form-control input-number" value="1">

            <span class="input-group-prepend">
                <button type="button" class="btn quantity-right-plus" data-type="plus" data-field=""><i class="ti-angle-right"></i></button>
            </span>
        </div>
    </div>
    <!-- price increase and decrease end -->

    <button type="submit" id="cartEffect" class="btn btn-solid hover-solid btn-animation" 
          @if ( $productDetails->quantity == 0 )
               disabled
          @endif
    >
        <i class="fa fa-shopping-cart me-1" aria-hidden="true"></i> 
        add to cart
    </button> 
</form>