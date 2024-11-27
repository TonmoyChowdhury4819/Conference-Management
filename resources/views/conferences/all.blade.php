@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="col-md-12">
    @foreach($conferences as $c)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin-dashboard/'.$c->admin_id) }}"><i class=""></i>My Conference</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('create-conference/'.$c->admin_id) }}"><i class=""></i>+Add Conference Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('conference/'.$c->id) }}"><i class=""></i>Conference Info</a>
        </li>
    </ul>
    @endforeach
    <div class="card">
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th>#</th>
                        <th>Title</th>
                        <th>Short Name</th>
                        <th>URL</th>
                        <th>Start Date</th>
                        <th>Submission Date</th>
                        <th>Acceptance</th>
                        <th>Camera Ready</th>
                        <th>Registration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach($conferences as $c)

                    <tr class="table-info">
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->title }}</td>
                        <td>{{ $c->short_name }}</td>
                        <td>{{ $c->url }}</td>
                        <td>{{ $c->start_date }}</td>
                        <td>{{ $c->submission_deadline }}</td>
                        <td>{{ $c->acceptance }}</td>
                        <td>{{ $c->camera_ready }}</td>
                        <td>{{ $c->registration }}</td>

                        <td>
                        <a class="btn rounded-pill btn-primary" href="{{ url('conference-details/'.$c->id) }}"><i class="tf-icons bx bx-file"></i> View Details</a>    
                        <a class="btn rounded-pill btn-success" href="{{ url('edit-conference/'.$c->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="btn rounded-pill btn-danger" data-bs-toggle="modal" data-bs-target="#smallModal{{ $c->id }}"><i class="bx bx-trash me-1"></i>Delete</a>
                            <div class="modal fade" id="smallModal{{ $c->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete {{ $c->title }}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-success btn-fw" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <a class="btn btn-outline-danger btn-fw" href="{{ url('delete-conference/'.$c->id) }}">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection