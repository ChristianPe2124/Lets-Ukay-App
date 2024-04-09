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
<!-- Success & Error Message -->

    <section class="">
      <div class="container">
        <div class="row">
          <!-- sidebar -->
          <div class="col-lg-3 sticky-top sticky-offset pt-2 vh-100 overflow-auto">
            <!-- Toggle button -->
            <button
              class="btn btn-outline-secondary mb-3 w-100 d-lg-none"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span>Show filter</span>
            </button>
            <!-- Collapsible wrapper -->
            <div
              class="collapse card d-lg-block mb-5"
              id="navbarSupportedContent"
            >
              <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button
                      class="accordion-button text-dark bg-light"
                      type="button"
                      data-mdb-toggle="collapse"
                      data-mdb-target="#panelsStayOpen-collapseOne"
                      aria-expanded="true"
                      aria-controls="panelsStayOpen-collapseOne"
                    >
                      Related items
                    </button>
                  </h2>
                  <div
                    id="panelsStayOpen-collapseOne"
                    class="accordion-collapse collapse show"
                    aria-labelledby="headingOne"
                  >
                    <div class="accordion-body">
                      <ul class="list-unstyled">
                        <li><a href="#" class="text-dark">Electronics </a></li>
                        <li><a href="#" class="text-dark">Home items </a></li>
                        <li>
                          <a href="#" class="text-dark">Books, Magazines </a>
                        </li>
                        <li>
                          <a href="#" class="text-dark">Men's clothing </a>
                        </li>
                        <li>
                          <a href="#" class="text-dark">Interiors items </a>
                        </li>
                        <li><a href="#" class="text-dark">Underwears </a></li>
                        <li>
                          <a href="#" class="text-dark">Shoes for men </a>
                        </li>
                        <li><a href="#" class="text-dark">Accessories </a></li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button
                      class="accordion-button text-dark bg-light"
                      type="button"
                      data-mdb-toggle="collapse"
                      data-mdb-target="#panelsStayOpen-collapseThree"
                      aria-expanded="false"
                      aria-controls="panelsStayOpen-collapseThree"
                    >
                      Price
                    </button>
                  </h2>
                  <div
                    id="panelsStayOpen-collapseThree"
                    class="accordion-collapse collapse show"
                    aria-labelledby="headingThree"
                  >
                    <div class="accordion-body">
                      <div class="range">
                        <input
                          type="range"
                          class="form-range"
                          id="customRange1"
                        />
                      </div>
                      <div class="row mb-3">
                        <div class="col-6">
                          <p class="mb-0">Min</p>
                          <div class="form-outline">
                            <input
                              type="number"
                              id="typeNumber"
                              class="form-control"
                            />
                            <label class="form-label" for="typeNumber"
                              >$0</label
                            >
                          </div>
                        </div>
                        <div class="col-6">
                          <p class="mb-0">Max</p>
                          <div class="form-outline">
                            <input
                              type="number"
                              id="typeNumber"
                              class="form-control"
                            />
                            <label class="form-label" for="typeNumber"
                              >$1,0000</label
                            >
                          </div>
                        </div>
                      </div>
                      <button
                        type="button"
                        class="btn btn-white w-100 border border-secondary"
                      >
                        apply
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content -->
          <div class="col-lg-9">
            <header
              class="d-sm-flex align-items-center border-bottom mb-4 pb-3"
            >
              @if(!$productCount)
              <strong class="d-block py-2">No Items found </strong>
              @else
              <strong class="d-block py-2">{{ $productCount->count() }} Items found </strong>
              @endif
            </header>

            @forelse($buy_products as $item)
            <div class="row justify-content-center mb-3">
              <div class="col-md-12">
                <div class="card shadow-0 border rounded-3">
                  <div class="card-body">
                    <div class="row g-0">
                      <div
                        class="col-xl-3 col-md-4 d-flex justify-content-center"
                      >
                        <div
                          class="bg-image hover-zoom ripple rounded ripple-surface me-md-3 mb-3 mb-md-0"
                        >
                          <img
                            src="{{ asset('storage/product_image/' .$item->src) }}"
                            class="w-100 rounded img-fluid"
                          />
                          <a href="#!">
                            <div class="hover-overlay">
                              <div
                                class="mask"
                                style="
                                  background-color: rgba(253, 253, 253, 0.15);
                                "
                              ></div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-5 col-sm-7">
                        <h5>{{ $item->product_name }}</h5>
                        <div class="d-flex flex-row">
                            <h5>Status: {{ ucfirst($item->status) }}</h5>
                        </div>
                        <p class="text mb-4 mb-md-0">
                          {{ $item->product_desc }}
                        </p>
                      </div>
                      <div class="col-xl-3 col-md-3 col-sm-5">
                        <div class="d-flex flex-row align-items-center mb-1">
                          <h4 class="mb-1 me-1">₱{{ $item->price }}</h4>
                          <!-- <span class="text-danger"><s>$49.99</s></span> -->
                        </div>
                        <h6 class="text-success">Free shipping</h6>
                        <div class="mt-4">
                        <form action="{{ route('cart.post', $item->product_id) }}" method="POST">
                        @csrf
                            <input type="submit" value="Mine" class="btn btn-primary shadow-0">
                            <a
                                href="#!"
                                class="btn btn-danger border px-2 pt-2 icon-hover"
                                ><i class="fas fa-heart fa-lg px-1"></i
                            ></a>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty
                <p>No Record</p>
            @endforelse

            <hr />

            <!-- Pagination -->

            <nav
              aria-label="Page navigation example"
              class="d-flex justify-content-center mt-3"
            >
              <ul class="pagination">
                <li class="page-item active">
                    {{ $buy_products->links() }}
                </li>
              </ul>
            </nav>
            <!-- Pagination -->
          </div>
          <!-- content -->
        </div>
      </div>
    </section>
@endsection
