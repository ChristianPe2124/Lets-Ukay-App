@extends('layouts.homeApp')
@section('content')
<!-- SVG -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
<!-- SVG -->

<br>

<!-- Success & Error Message -->
    @if (session('is_admin_error'))
    <div class="container" id="messageAlert">
        <div class="alert alert-danger d-flex align-items-center d-flex justify-content-between" role="alert">
            <div>
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                {{ session('is_admin_error') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
    @if (session('success'))
        <div class="container" id="messageAlert">
            <div class="alert alert-success d-flex align-items-center d-flex justify-content-between" role="alert">
                <div>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="container" id="messageAlert">
            <div class="alert alert-danger d-flex align-items-center d-flex justify-content-between" role="alert">
                <div>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    </div>
      <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12">
            <div
              class="card card-registration card-registration-2"
              style="border-radius: 15px">
              <div class="card-body p-0">
                <div class="row g-0">
                  <!-- Cart items -->
                  <div class="col-lg-8">
                    <div class="p-5">
                    <!-- Cart header -->
                      <div class="d-flex justify-content-between align-items-center mb-5">
                        <h1 class="fw-bold mb-0 text-black">My Cart</h1>
                        @if(empty($cart_order_count))
                        <h6 class="mb-0 text-muted">0 items</h6>
                        @else
                        <h6 class="mb-0 text-muted">{{ $cart_order_count->count() }} items</h6>
                        @endif
                      </div>
                    @if($cart_order->count() > 0)
                    <!-- Remove all button -->
                    <button class="btn btn-success col-md-4 col-lg-3 col-xl-3 deleteAllSelectedRecord" data-url="{{ url('DeleteAllSelected') }}" id="deleteAllSelectedRecord">
                      Remove All Selected
                    </button> <br><br>

                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <input class="form-check-input" type="checkbox" name="deleteAll" id="selectAllIds">
                        <label for="">Select All</label>
                    </div>
                    <!-- Remove all button -->
                    @else
                    @endif
                      <hr class="my-4" />
                    <!-- Cart header -->
                    <!-- Cart Body -->
                    @forelse($cart_order as $product)
                    <div class="body">
                    <!-- Single Remove -->
                    <div class="col-md-1 col-lg-1 col-xl-1">
                        <input class="form-check-input checkbox_ids" type="checkbox" name="ids" value="{{ $product->productID }}" id="allProductIds">
                    </div>
                     <div class="col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                        <form action="{{ route('cart_destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-dark border-0">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                     </div>
                    <!-- Single Remove -->
                      <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2 text-center">
                          <img
                            src="{{ asset('storage/product_image/' .$product->src) }}"
                            class="img-fluid rounded-3"
                            alt="Cotton T-shirt"
                          />
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3 mb-2">
                          <h6 class="text-muted">{{ $product->product_name }}</h6>
                          <h6 class="text-black mb-0">{{ $product->product_desc }}</h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex mb-2">
                          <input
                            id="form1"
                            min="0"
                            name="quantity"
                            value="1"
                            type="number"
                            class="form-control form-control-sm"
                            disabled
                          />
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 mb-2">
                          <h6 class="mb-0">₱{{ $product->price }}</h6>
                        </div>
                      </div>
                  </div>
                    @empty
                    <h1>Empty Cart</h1>
                    @endforelse
                    <!-- Cart Body -->
                      <hr class="my-4" />
                      <div class="d-flex justify-content-end">
                      {{ $cart_order->links() }}
                      </div>
                  <!-- Footer Note -->
                      <div class="pt-5">
                        <h6 class="mb-0">
                          Please note that you have 3 days to place your order.
                          If you don't complete your purchase within that time
                          frame, the items in your cart may become unavailable
                          or their prices may change.
                        </h6>
                      </div>
                    </div>
                  <!-- Footer Note -->
                  </div>
                  <!-- Cart items -->

                  <!-- Summary -->
                  <div class="col-lg-4 bg-grey text-center">
                    <div class="p-5">
                      <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                      <hr class="my-4" />

                      <div class="d-flex justify-content-between mb-4">
                        @if(empty($cart_order_count))
                        <h5 class="text-uppercase">items 0</h5>
                        @else
                        <h5 class="text-uppercase">items {{ $cart_order_count->count() }}</h5>
                        @endif
                        <h5 class="summary_price">₱{{ $price_summary }}</h5>
                      </div>

                      <hr class="my-4" />

                      <div class="d-flex justify-content-between mb-5">
                        <h5 class="text-uppercase">Total price</h5>
                        <h5 class="summary_price">₱{{ $price_summary }}</h5>
                      </div>

                      <form action="{{ route('order-details.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($cart_order_count->count() == 0)
                        <a href="{{ route('buy') }}" type="submit" class="btn btn-primary btn-block btn-lg">
                          Continue Shopping
                        </a>
                        @else
                        <button
                          type="submit"
                          class="btn btn-dark btn-block btn-lg order_Button "
                          style="background-color: #69BF76"
                          data-mdb-ripple-color="dark"
                        >
                          Order
                        </button>
                        @endif
                      </form>
                    </div>
                  </div>
                  <!-- Summary -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
