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
      <div class="modal-body">
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" name="product_name" class="form-control" id="exampleFormControlInput1" placeholder="Name of the item">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <input type="text" name="product_desc" class="form-control" id="exampleFormControlInput1" placeholder="Description">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Seller</label>
                <input type="text" name="product_seller" class="form-control" id="exampleFormControlInput1" placeholder="Seller name">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                </div>
                <select name="product_status" class="col-md-10 custom-select" id="inputGroupSelect01">
                    <option value="active" selected >Active</option>
                    <option value="decline">Decline</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" id="formFile">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
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
            <tr>
                <td>Micheal 5 360</td>
                <td>Photo here 50px</td>
                <td>One of the best version of Jordan Collections</td>
                <td>Christian Pe</td>
                <td>Decline</td>
                <td style="text-align: center;">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>Jordan 5 360</td>
                <td>Photo here 50px</td>
                <td>One of the best version of Jordan Collections</td>
                <td>Christian Pe</td>
                <td>Active</td>
                <td style="text-align: center;">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>Jordan 5 360</td>
                <td>Photo here 50px</td>
                <td>One of the best version of Jordan Collections</td>
                <td>Christian Pe</td>
                <td>Active</td>
                <td style="text-align: center;">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>Jordan 5 360</td>
                <td>Photo here 50px</td>
                <td>One of the best version of Jordan Collections</td>
                <td>Christian Pe</td>
                <td>Active</td>
                <td style="text-align: center;">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>Jordan 5 360</td>
                <td>Photo here 50px</td>
                <td>One of the best version of Jordan Collections</td>
                <td>Christian Pe</td>
                <td>Active</td>
                <td style="text-align: center;">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
