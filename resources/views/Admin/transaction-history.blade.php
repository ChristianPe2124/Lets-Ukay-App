@extends('layouts.adminApp')
@section('content')


<div class="container wrapper">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <table class=" table table-bordered table-striped table-hover" id="productTable">
        <thead class="table-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Status</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody class="page-data">
            @forelse($transaction as $item)
                <tr">
                    <td>{{ $item->name }}</td>
                    <td style="text-align: center; object-fit:fill;">
                        <img src="{{ asset('storage/product_image/' .$item->src) }}" loading="lazy" width="70px" height="70px" alt="">
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
            @empty
                <tr">
                    <td>No Record</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
