@extends('dashboard.layouts.superadmindefault')
@section('abc')
<div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <hr class="my-0">
                    <div class="card-body">
                      <form method="POST" action="{{ url('update-admin/'.$admin->id) }}">
                      {{ csrf_field() }}
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $admin->name }}" autofocus="">
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" value="{{ $admin->email}}">
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="{{$admin->password}}" >
                          </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
                  </div>
@endsection