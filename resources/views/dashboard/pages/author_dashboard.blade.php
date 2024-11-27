@extends('dashboard.layouts.authordefault')
@section('abc')

<div class="col-md-12">
    
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('author-dashboard') }}"><i class=""></i>All Conferences</a>
        </li>
    </ul>
    
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th>Title</th>
                        <th>URL</th>
                        <th>Submission Date</th>
                        <th>Acceptance</th>
                        <th>Camera Ready</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach($conferences as $c)

                    <tr class="table-info">
                        <td>{{ $c->title }}</td>
                        <td>{{ $c->url }}</td>
                        <td>{{ $c->submission_deadline }}</td>
                        <td>{{ $c->acceptance }}</td>
                        <td>{{ $c->camera_ready }}</td>
                        <td>{{ $c->start_date }}</td>
                        <td>{{ $c->end_date }}</td>
                        <td><a class="btn rounded-pill btn-primary" href="{{ url('conference-description/'.$c->id) }}"><i class="tf-icons bx bx-edit-alt me-1"></i>Description</a>
                            <a class="btn rounded-pill btn-info" href="{{ url('upload-papers/'.$c->id) }}"><i class="tf-icons bx bx-file"></i> Submit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection