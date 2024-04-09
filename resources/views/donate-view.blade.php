@extends('layouts.homeApp')

@section('content')

<br>
<br>
    @if (session('success'))
        <div class="container" id="messageAlert">
            <div class="alert alert-success d-flex align-items-center d-flex justify-content-between" role="alert">
                <div>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="container" id="messageAlert">
            <div class="alert alert-danger d-flex align-items-center d-flex justify-content-between" role="alert">
                <div>
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

<div class="container mt-5 d-flex justify-content-center align-items-center" style="height: 50svh">
    <form action="{{ route('donate.post') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-auto">
            <label for="Email" class="col-sm-2 col-form-label">Email</label>
        </div>
        <div class="col-auto">
            <input type="email" name="email" class="form-control" id="" placeholder="email@example.com" require>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Submit</button>
        </div>
    </form>
</div>

@endsection
