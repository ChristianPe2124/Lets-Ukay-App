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
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody class="page-data">
        @if(!empty($request_view))
            @forelse($request_view as $item)
                <tr">
                    <td>{{ $item->name }}</td>
                    <td  style="text-align:center;">
                        <img src="{{ asset('storage/product_image/' .$item->src) }}" loading="lazy" width="70px" height="70px" alt="">
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->product_desc }}</td>
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
        @else
            <tr">
                <td>No Record</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endif
        </tbody>
    </table>
        @if(!empty($clientID))
        <div class="requestView-btn float-end">
            <form action="{{ route('transaction.post', $clientID) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-success">
                    Approve
                </button>
            </form>
            <form action="{{ route('transaction.cancel', $clientID) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Cancel
                </button>
            </form>
        </div>
        @else
    @endif
</div>

@endsection
