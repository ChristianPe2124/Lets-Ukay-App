@extends('layouts.adminApp')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Welcome to the Admin Dashboard</h3>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="table-responsive-xl container">
    @if($errors->any())
        <div class="alert alert-success product_error_success_alert" role="alert" id="err_success_alert">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
            <button type="button" class="btn-close" id="alert_button" aria-label="Close"></button>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success product_error_success_alert" role="alert" id="err_success_alert">
            {{ session('success') }}
            <button type="button" class="btn-close" id="alert_button" aria-label="Close"></button>
        </div>
    @endif

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    ADD ITEM
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD NEW ITEM</h5>
            <button style="border: none; outline:none; background:transparent; font-size: 30px" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="product_name" required class="form-control" placeholder="Name of the item">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="product_desc" required class="form-control" placeholder="Description">
                    </div>
                    <div class="mb-3">
                        <label>Seller</label>
                        <input type="text" name="product_seller" required class="form-control" placeholder="Seller name">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Status</label>
                        </div>
                        <select name="product_status" class="col-md-10 custom-select">
                            <option value="active" selected >Active</option>
                            <option value="decline">Decline</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input name="src" class="form-control" type="file" id="formFile">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- end modal -->
    <table class="table table-bordered table-striped table-hover" id="productTable">
        <thead class="table-dark">
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Photo</th>
                <th scope="col">Description</th>
                <th scope="col">Seller</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="page-data">
            @foreach($products as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td style="text-align: center; object-fit:fill;">
                    <img src="{{ asset('storage/product_image/' .$item->src) }}" loading="lazy" width="70px" height="70px" alt="">
                </td>
                <td>{{ $item->product_desc }}</td>
                <td>{{ $item->seller_name }}</td>
                <td>{{ $item->status }}</td>
                <td style="text-align: center;">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
