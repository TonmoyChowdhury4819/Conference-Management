@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="card mb-4">
    <h5 class="card-header">Reviewers Details</h5>
    <!-- Account -->
    <hr class="my-0">
    <div class="card-body">
        <form method="POST" action="{{ url('update-reviewer/'.$reviewer->id) }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label class="form-label">Conference ID</label>
                    <input class="form-control" type="text" value="{{ $reviewer->conference_id }}" name="conference_id" autofocus="">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Scopes</label>
                    <input class="form-control" type="text" value="{{ $reviewer->scopes }}" name="scopes" autofocus="">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" value="{{ $reviewer->name }}" name="name">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="{{ $reviewer->email }}">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="{{ $reviewer->password }}">
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                <a href="{{ url('registered-reviewers/'.$reviewer->conference_id) }}">
                    <button type="button" class="btn btn-outline-secondary">Back</button>
                </a>
            </div>
        </form>
    </div>
    <!-- /Account -->
</div>

@endsection