@extends('layouts.app')

@section('content')
<!-- css link -->
<link href="{{ asset('css/buyPage.css') }}" rel="stylesheet">

    @if (session('is_admin_error'))
        <div class="alert alert-danger" role="alert">
            {{ session('is_admin_error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="buy-product-wrapper">
        @forelse($buy_products as $item)
            <div class="card" style="width: 15rem;">
            <img src="{{ asset('storage/product_image/' .$item->src) }}" height="300" width="400" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ucfirst(trans($item->product_name))}}</h5>
                <h5 class="card-title">{{ucfirst(trans($item->status))}}</h5>
                <p class="card-text">{{(ucfirst(trans($item->product_desc)))}}</p>

                <form action="{{ route('cart.post',$item->product_id) }}" method="POST">
                @csrf
                    <input type="submit" value="Mine" class="btn btn-primary btn-lg btn-block">
                </form>

            </div>
            </div>
        @empty
        <p>No Record</p>
        @endforelse
        </div>
@endsection
