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
                <th scope="col">Email</th>
                <th scope="col">Product</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Pin</th>
                <th scope="col">Phone no.</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody class="page-data">
        @forelse($requestProcess as $item)
            <tr">
                <td>{{ $item->name }}</td>
                <td  style="text-align:center;">
                    <img src="{{ asset('storage/product_image/' .$item->src) }}" loading="lazy" width="70px" height="70px" alt="">
                </td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->product_desc }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->order_pin }}</td>
                <td>(+63) {{ $user->contact_no }}</td>
                <td>{{ $item->status }}</td>
            </tr>
        @empty
            <tr">
                <td>No Record</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @if($requestProcess[0]['status'] == "Shipped")
    <div class="text-end">
        <a href="{{ route('request') }}" class="btn btn-primary">
        <i class="fa-solid fa-arrow-left"></i>
            Go Back
        </a>
    </div>
    @else
    <div class="d-flex justify-content-between align-items-center">
        <form action="{{ route('transaction.cancel') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-lg">
            <i class="fa-regular fa-trash-can"></i>
                Cancel
            </button>
            <input type="hidden" name="order_pin" value="{{ $requestProcess[0]['order_pin'] }}">
            <input type="hidden" name="user_id" value="{{ $requestProcess[0]['user_id'] }}">
        </form>
        <form action="{{ route('request.post') }}" method="POST">
            @csrf
            <input type="hidden" name="created_at" value="{{ $requestProcess[0]['created_at'] }}">
            <input type="hidden" name="user_id" value="{{ $requestProcess[0]['user_id'] }}">
            <button type="submit" class="btn btn-success btn-lg">
            <i class="fa-solid fa-truck"></i>
                Shipped
            </button>
        </form>
    </div>
    @endif
</div>

@endsection
