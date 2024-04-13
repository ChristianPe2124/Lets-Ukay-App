@extends('layouts.homeApp')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <!-- Table Body -->
            <div class="card">
                <div class="card-header">
                    <h2>My Orders</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <!-- <td>{{ $item->status == '0' ? 'Processing' : 'Completed'}}</td> -->
                                    <td>{{ $item->status}}</td>
                                    <td>{{ $item->total}}</td>
                                    <td>
                                        <a href="{{ url('order-details/'. $item->user_id.'/'. $item->created_at) }}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Empty</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if($orders->count() == 0)
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('buy') }}" class="btn btn-primary col-md-2 col-lg-3 col-xl-2">Continue Shopping</a>
                    </div>
                    @endif
                </div>
            </div>
            <!-- Table Body -->

            <!-- Pagination -->
            <nav
              aria-label="Page navigation example"
              class="d-flex justify-content-end mt-3"
            >
              <ul class="pagination">
                <li class="page-item active">
                    {{ $orders->links() }}
                </li>
              </ul>
            </nav>
            <!-- Pagination -->
        </div>
    </div>
</div>

@endsection
