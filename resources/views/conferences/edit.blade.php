@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="col-md-12">
  @if(Session::has('success'))
  <div class="alert alert-success">
    <strong>{{ Session::get('success') }}</strong>
  </div>
  @endif
  <div class="card mb-4">
    <h5 class="card-header">Conference Details</h5>
    <hr class="my-0">
    <div class="card-body">
      <form method="POST" action="{{ url('update-conference/'.$conferences->id) }}">
        {{ csrf_field() }}
        <div class="row">
          <div class="mb-3 col-md-6">
            <label class="form-label">Conference ID</label>
            <input class="form-control" type="text" name="id" value="{{ $conferences->id }}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Conference Title</label>
            <input class="form-control" type="text" name="title" value="{{ $conferences->title }}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Short Name</label>
            <input class="form-control" type="text" name="short_name" value="{{ $conferences->short_name }}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">URL</label>
            <input class="form-control" type="url" name="url" value="{{ $conferences->url }}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{$conferences->description}}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Start Date</label>
            <input type="date" class="form-control" name="start_date" value="{{$conferences->start_date}}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date" value="{{$conferences->end_date}}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Submission</label>
            <input type="date" class="form-control" name="submission_deadline" value="{{$conferences->submission_deadline}}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Acceptance</label>
            <input type="date" class="form-control" name="acceptance" value="{{$conferences->acceptance}}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Camera Ready</label>
            <input type="date" class="form-control" name="camera_ready" value="{{$conferences->camera_ready}}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Registration</label>
            <input type="date" class="form-control" name="registration" value="{{$conferences->registration}}">
          </div>
          <div class="mb-3 col-md-6">
            <label class="form-label">Admin ID</label>
            <input class="form-control" type="text" name="admin_id" value="{{ $conferences->admin_id }}">
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Save changes</button>
            <a href="{{ url('conference/'.$conferences->admin_id) }}">
              <button type="button" class="btn btn-outline-secondary">Back</button>
            </a>
          </div>
        </div>
      </form>
    </div>
    <!-- /Account -->
  </div>
</div>
@endsection