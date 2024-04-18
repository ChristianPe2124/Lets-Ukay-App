@extends('layouts.adminApp')

@section('content')
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

    @if(session('error'))
        <div class="alert alert-danger product_error_success_alert" role="alert" id="err_success_alert">
            {{ session('error') }}
            <button type="button" class="btn-close" id="alert_button" aria-label="Close"></button>
        </div>
    @endif
    <!-- ADD Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
        ADD ITEM
    </button>

    <!-- ADD Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Category</label>
                        </div>
                        <select name="product_category" class="col-md-9 custom-select">
                            <option value="skirt" selected >Skirt</option>
                            <option value="short" selected >Short</option>
                            <option value="blouse" selected >Blouse</option>
                            <option value="dress" selected >Dress</option>
                            <option value="coat" selected >Coat</option>
                            <option value="swimwear" selected >Swimwear</option>
                            <option value="shirt" selected >Shirt</option>
                            <option value="suit">Suit</option>
                            <option value="formal">Formal</option>
                            <option value="footwear">Footwear</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Name</label>
                        <input value="" type="text" name="product_name" required class="form-control" placeholder="Name of the item">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <input type="text" name="product_desc" required class="form-control" placeholder="Description">
                    </div>
                    <div class="mb-3">
                        <label>Seller</label>
                        <input type="text" name="product_seller" required class="form-control" placeholder="Seller name">
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="text" name="product_price" required class="form-control" placeholder="Price">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Status</label>
                        </div>
                        <select name="product_status" class="col-md-10 custom-select">
                            <option value="instock" selected >In-Stock</option>
                            <option value="outofstock">Out of Stock</option>
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
    <!-- ADD end modal -->

    <!-- EDIT Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
            <button onclick="modal_hide()" style="border: none; outline:none; background:transparent; font-size: 30px" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('/admin/home/') }}" id="editForm" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            @csrf
            @method('PUT')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Category</label>
                    </div>
                    <select name="product_category" id="product_category" class="col-md-9 custom-select">
                        <option value="skirt" selected >Skirt</option>
                        <option value="short" selected >Short</option>
                        <option value="blouse" selected >Blouse</option>
                        <option value="dress" selected >Dress</option>
                        <option value="coat" selected >Coat</option>
                        <option value="swimwear" selected >Swimwear</option>
                        <option value="shirt" selected >Shirt</option>
                        <option value="suit">Suit</option>
                        <option value="formal">Formal</option>
                        <option value="footwear">Footwear</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Name</label>
                    <input value="" type="text" name="product_name" id="product_name" required class="form-control" placeholder="Name of the item">
                </div>
                <div class="mb-3">
                    <label>Description</label>
                    <input type="text" name="product_desc" id="product_desc" class="form-control" placeholder="Description">
                </div>
                <div class="mb-3">
                    <label>Seller</label>
                    <input type="text" name="product_seller" id="product_seller" required class="form-control" placeholder="Seller name">
                </div>
                <div class="mb-3">
                    <label>Price</label>
                    <input type="text" name="product_price" id="product_price" required class="form-control" placeholder="Price">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Status</label>
                    </div>
                    <select name="product_status" id="product_status" class="col-md-10 custom-select">
                        <option value="instock" selected >In-Stock</option>
                        <option value="outofstock">Out of Stock</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input name="src" class="form-control" type="file" id="formFile">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="modal_hide()" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- EDIT end modal -->

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
            <button onclick="modal_hide()" style="border: none; outline:none; background:transparent; font-size: 30px" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ url('/admin/home/') }}" id="deleteForm" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
            @csrf
            @method('DELETE')
            <!-- Incase method delete don't work -->
            <input type="hidden" name="_method" value="DELETE">
            <!-- Incase method delete don't work -->
            <p>Are You Sure ?..</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="modal_hide()" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes, Delete Data</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- Delete end modal -->

    <!-- DATATABLE -->
    <table class="table table-bordered table-striped table-hover" id="productTable">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Photo</th>
                <th scope="col">Description</th>
                <th scope="col">Seller</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="page-data">
            @foreach($products as $item)
            <tr>
                <td>{{ $item->product_id }}</td>
                <td>{{ $item->product_name }}</td>
                <td style="text-align: center; object-fit:fill;">
                    <img src="{{ asset('storage/product_image/' .$item->src) }}" loading="lazy" width="70px" height="70px" alt="">
                </td>
                <td>{{ $item->product_desc }}</td>
                <td>{{ $item->seller_name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->status }}</td>
                <td style="text-align: center;">
                    @if($item->status === "pending" || $item->status === "Processing")
                    <button type="button" class="btn btn-primary edit" disabled>
                            <i class="fa-solid fa-pen-to-square" style="color: #fff;"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete" disabled>
                            <i class="fa-solid fa-trash" style="color: #fff;"></i>
                    </button>
                    @else
                    <button type="button" class="btn btn-primary edit">
                            <i class="fa-solid fa-pen-to-square" style="color: #fff;"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete">
                            <i class="fa-solid fa-trash" style="color: #fff;"></i>
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- END OF DATATABLE -->
</div>
@endsection
