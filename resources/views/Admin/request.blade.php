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

        <table class="table table-bordered table-striped table-hover" id="productTable">
        <thead class="table-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="page-data">
        @forelse($order_product as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->status }}</td>
                <td style="text-align: center;">
                    <form action="{{ route('request-view', $item->user_id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-primary edit">
                                <i class="fa-solid fa-pen-to-square" style="color: #fff;"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <p>No Record</p>
        @endforelse
        </tbody>
    </table>



    </div>







@endsection
