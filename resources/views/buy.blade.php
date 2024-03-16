@extends('layouts.app')

@section('content')
<!-- css link -->
<link href="{{ asset('css/buyPage.css') }}" rel="stylesheet">

    @if (session('is_admin_error'))
        <div class="alert alert-danger" role="alert">
            {{ session('is_admin_error') }}
        </div>
    @endif
    <div class="buy-product-wrapper">
        <div class="card" style="width: 15rem;">
        <img src="{{ url('/products/shoes-01.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Item Name</h5>
            <p class="card-text">Description</p>
            <a href="#" class="btn btn-primary btn-lg btn-block">Mine</a>
        </div>
        </div>
        <div class="card" style="width: 15rem;">
        <img src="{{ url('/products/shoes-01.png') }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Item Name</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary btn-lg btn-block">Mine</a>
        </div>
        </div>
    </div>

@endsection
