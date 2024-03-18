@extends('layouts.app')
@section('content')

    @forelse($cart_order as $order)
        {{ $order->id }} <br>
        <img src="{{ asset('storage/product_image/' .$order->src) }}" alt="">
        {{ $order->product_name }} <br>
        {{ $order->product_desc }} <br>
        {{ $order->status }} <br>
        {{ $order->user_id }} <br>
        {{ $order->name }} <br>
        {{ $order->email }} <br>
    @empty
        <p>No Record</p>
    @endforelse

@endsection
