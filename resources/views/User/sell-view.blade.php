@extends('layouts.homeApp')

@section('content')
    @if (session('success'))
        <div class="container" style="z-index: 1;" id="messageAlert">
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

    <!-- Header -->
    <header
      class="py-5 bg-image"
      style="
        background-image: url('./images/sell.svg');
        height: 80vh;
        background-repeat: no-repeat;
        background-size: cover;
      "
    >
      <div class="container px-5">
        <div class="row gx-5 justify-content-start">
          <div class="col-lg-6">
            <div class="text-center my-5 first_Content">
              <h1 class="display-5 fw-normal text-black mb-2 title_Header">
                We do the selling. <br />
                You take the credit.
              </h1>

              <p class="caption">
                Send us your preloved items and earn cash.
                <br />
                Please add your email address and let's talk ka-Ukay!
              </p>
              <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <form action="{{ route('sell.post') }}" method="POST" class="row g-3">
                    @csrf
                  <div class="col-auto">
                    <label for="staticEmail2" class="visually-hidden"
                      >Email</label
                    >
                  </div>
                  <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden"
                      >Add Email</label
                    >
                    <input
                      type="email"
                      name="email"
                      class="form-control"
                      id="inputPassword2"
                      placeholder="Add Email"
                    />
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn-primary mb-3 btn_Email">
                      Send Email
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header End -->

    
    <!---How it works-->
    <section class="container px-5 my-5 how_it_works">
        <h1 class="text-center fw-light title_How">HOW IT WORKS</h1>
        <p class="text-center fw-light"> We will help to clean out your closet Ka-Ukay!</p>
        <section>
            <div class="container px-5">
              <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                  <div class="p-5">
                    <img
                      class="img-fluid rounded-circle"
                      src="./images/girl1.jpg   "
                      alt="..."
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <h2 class="display-6 fw-bold">1. Fill up your kit.</h2>
                    <p class="fw-light">
                        Free up space in your closet by filling any box or bag with gently used items you no longer wear, need, or love.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section>
            <div class="container px-5">
              <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                  <div class="p-5">
                    <img
                      class="img-fluid rounded-circle"
                      src="./images/girl2.jpg"
                      alt="..."
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <h2 class="display-6 fw-bold">2. Send us your stuff.</h2>
                    <p class="fw-light">
                        Please add your email so we can send our contact details and we can talk together for shipping and prices of your items.
                        Items that meet our quality standards are photographed, listed and shipped to our fellow ka-Ukay.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section>
            <div class="container px-5">
              <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                  <div class="p-5">
                    <img
                      class="img-fluid rounded-circle"
                      src="./images/girl3.jpg"
                      alt="..."
                    />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="p-5">
                    <h2 class="display-6 fw-bold">3. We do the rest!</h2>
                    <p class="fw-light">
                       Now it's ready to sell! We work to ensure your items sell as quickly as possible.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </section>
    <!---How it works-->

@endsection
