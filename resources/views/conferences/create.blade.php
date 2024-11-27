@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="row">
    <div class="col-md-12">
        @foreach($conferences as $c)
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin-dashboard/'.$c->id) }}"><i class=""></i>My Conference</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('create-conference/'.$c->id) }}"><i class=""></i>+Add Conference Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('conference'.$c->id) }}"><i class=""></i>Conference Info</a>
            </li>
        </ul>
        @endforeach
        <div class="card mb-4">
            <hr class="my-0">
            <div class="card-body">
                <form method="POST" action="{{ url('store-conference') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Conference ID</label>
                            <input class="form-control" type="text" name="id" value="{{ $c->conference_id }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Conference Title</label>
                            <input class="form-control" type="text" name="title" value="{{ $c->title }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Short Name</label>
                            <input class="form-control" type="text" name="short_name" value="{{ $c->short_name }}">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">URL</label>
                            <input class="form-control" type="url" name="url">
                        </div>
                        <div>
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" class="form-control" name="start_date">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date">
                        </div>

                        <h5 class="card-header">DeadLine Dates</h5>
                        <hr class="my-0">
                        <br>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Submission</label>
                            <input type="date" class="form-control" name="submission_deadline">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Acceptance</label>
                            <input type="date" class="form-control" name="acceptance">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Camera-Ready</label>
                            <input type="date" class="form-control" name="camera_ready">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Registration</label>
                            <input type="date" class="form-control" name="registration">
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Admin ID</label>
                        <input class="form-control" type="text" name="admin_id" value="{{ $c->id }}">
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>

@endsection