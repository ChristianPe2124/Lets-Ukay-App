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
                <th scope="col">Email</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="page-data">
            @forelse($transaction as $item)
                <tr">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->created_at->format('m/d/y') }}</td>
                    <td class="d-flex justify-content-center align-items-center">
                        <a href=" {{ url('transaction-history'. '/' . $item->user_id . '/' . $item->created_at  ) }} " class="btn btn-primary">
                            <i class="fa-solid fa-eye"></i>
                            &nbsp; View
                        </a>
                    </td>
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
