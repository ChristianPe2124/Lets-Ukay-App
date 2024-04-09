@extends('layouts.homeApp')
@section('content')

<!--Order Details-->
<section class="h-100 gradient-custom" style="background-color: #F2EADF">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-10 col-xl-8">
            <div class="card" style="border-radius: 10px;">
              <div class="card-header px-4 py-5">
                <h5 class="text-muted mb-0">Thanks for your Order, <span style="color: #a8729a;">{{ $firstName }}</span>!</h5>
              </div>

              <!-- Cards Body -->
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                  @if(empty($status[0]['status']))
                    <p class="small text-muted mb-0">Status : N/A</p>
                  @else
                    <p class="small text-muted mb-0">Status : {{ $status[0]['status'] }}</p>
                  @endif
                </div>
                <!-- Cards Item-->
                @forelse($OrderDetails as $product)
                <div class="card shadow-0 border mb-4 ">
                  <div class="card-body">
                      <!-- Cards Content -->
                      <div class="row  d-flex justify-content-between align-items-center">
                        <div class="col-md-2">
                          <img src="{{ asset('storage/product_image/' .$product->src) }}" class="img-fluid" alt="Phone">
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0">{{ $product->product_name }}</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">{{ $product->product_desc }}</p>
                        </div>
                        <!-- <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">Capacity: 64GB</p>
                        </div> -->
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">Qty: 1</p>
                        </div>
                        <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                          <p class="text-muted mb-0 small">₱{{ $product->price }}</p>
                        </div>
                      </div>
                    <!-- Cards Content -->
                  </div>
                </div>
                @empty
                <div class="card shadow-0 border mb-4 ">
                  <div class="card-body">
                      <!-- Cards Content -->
                        Empty Cart
                      <!-- Cards Content -->
                  </div>
                </div>
                @endforelse
                <!-- Cards Item -->

                <!-- Cards Details -->
                <div class="d-flex justify-content-between pt-2">
                  <p class="fw-bold mb-0">Order Details</p>
                  <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span>₱{{ number_format($price_summary, 2) }}</p>
                </div>

                <div class="d-flex justify-content-between pt-2">
                  <p class="text-muted mb-0">Invoice Number : 788152</p>
                  <p class="text-muted mb-0"><span class="fw-bold me-4">Discount</span> ₱0.00</p>
                </div>

                <div class="d-flex justify-content-between">
                  <p class="text-muted mb-0">Invoice Date : 22 Dec,2019</p>
                  <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span>₱50.00</p>
                </div>

                <div class="d-flex justify-content-between mb-5">
                  <p class="text-muted mb-0">Recepits Voucher : 18KU-62IIK</p>
                </div>
                <!-- Cards Details -->
              </div>
              <!-- Cards Body -->

              <!-- Card Footer -->
              <div class="card-footer border-0 px-4 py-5 d-flex justify-content-between align-items-center"
                    style="background-color: #a8729a;">
                <button class="btn btn-primary col-3">Received</button>
                <h5 class="d-flex align-items-center
                            justify-content-end text-white
                            text-uppercase mb-0">Total paid: <span class="h2 mb-0 ms-2">₱{{ number_format($delivery_price, 2) }}</span>
                </h5>
              </div>
              <!-- Card Footer -->
            </div>
          </div>
        </div>
      </div>
    </section>
<!--Order Details-->

@endsection
