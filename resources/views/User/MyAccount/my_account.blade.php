@extends('layouts.homeApp')

@section('content')
<!-- SVG -->
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
<!-- SVG -->

<!-- Success & Error Message -->
@if (session('is_admin_error'))
    <div class="container" id="messageAlert">
        <div class="alert alert-danger d-flex align-items-center d-flex justify-content-between" role="alert">
            <div>
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                {{ session('is_admin_error') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif
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
<section style="background-color: #f5f5f5;">
    <div class="container py-5">
    <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Profile Details</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
              <span class="d-none d-sm-block">Upload new photo</span>
              <i class="bx bx-upload d-block d-sm-none"></i>
              <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
            </label>
            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
              <i class="bx bx-reset d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Reset</span>
            </button>

            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
          </div>
        </div>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form id="" action="{{ route('myAccount.post') }}" method="POST">
        @csrf
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="fullname" class="form-label">Full Name</label>
              <input class="form-control" type="text" id="fullname" name="fullname" value="{{ ucfirst(trans(Auth()->user()->name)) }}" autofocus="">
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">E-mail</label>
              <input class="form-control" type="text" id="email" name="email" value="{{ ucfirst(trans(Auth()->user()->email)) }}" placeholder="john.doe@example.com">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label" for="phoneNumber">Phone Number</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text">PH (+63)</span>
                <input type="tel" value="{{ Auth()->user()->contact_no }}" name="phoneNumber" class="form-control" placeholder="(952) 439 5151" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="address" class="form-label">Address</label>
              <input type="text" value="{{ Auth()->user()->address }}" class="form-control" id="address" name="address" placeholder="Address">
            </div>
            <div class="mb-3 col-md-4">
              <label for="address" class="form-label">Old Password</label>
              <input type="password" value="" class="form-control" id="" name="old_password" placeholder="Old Password">
            </div>
            <div class="mb-3 col-md-4">
              <label for="address" class="form-label">New Password</label>
              <input type="password" value="" class="form-control" id="" name="new_password" placeholder="New Password">
            </div>
            <div class="mb-3 col-md-4">
              <label for="address" class="form-label">Confirm Password</label>
              <input type="password" value="" class="form-control" id="" name="confirm_password" placeholder="Confirm Password">
            </div>
          <div class="mt-2" style="">
              <button type="submit" class="btn btn-primary me-2 mb-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
          </div>
</form>
      </div>
      <!-- /Account -->
    </div>
    <!-- <div class="card">
      <h5 class="card-header">Delete Account</h5>
      <div class="card-body">
        <div class="mb-3 col-12 mb-0">
          <div class="alert alert-warning">
            <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
            <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
          </div>
        </div>
        <form id="formAccountDeactivation" onsubmit="return false">
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
            <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
          </div>
          <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
        </form>
      </div>
    </div> -->
  </div>
    </div>
</section>


@endsection
