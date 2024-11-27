@extends('dashboard.layouts.superadmindefault')
@section('abc')
<ul class="nav nav-pills flex-column flex-md-row mb-3">
  <li class="nav-item">
    <a class="nav-link" href="{{ url('superadmin-dashboard') }}"><i class=""></i>Conference's Admin</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{ url('conference-admin-register') }}"><i class=""></i>+Add New Co-Admin</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('all-coadmin') }}"><i class=""></i>Conference's Admin Info</a>
  </li>
</ul>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <hr class="my-0">
      <div class="card-body">
        @if(Session::has('err'))
        <div class="alert alert-danger">
          {{ Session::get('err') }}
        </div>
        @endif

        <form method="POST" action="{{ url('storeconference-adminregister') }}">
          {{ csrf_field() }}
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="form-label">Conference ID</label>
              <input class="form-control" type="text" name="conference_id">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Conference Title</label>
              <input class="form-control" type="text" name="title">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Short Name</label>
              <input class="form-control" type="text" name="short_name">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Confirm Password</label>
              <input type="password" class="form-control" name="confirm">
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Register</button>
            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>

@endsection