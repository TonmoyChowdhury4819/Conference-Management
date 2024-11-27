@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="col-md-12">
    @foreach($conferences as $c)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin-dashboard/'.$c->admin_id) }}"><i class=""></i>My Conference</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('registered-reviewers/'.$c->id) }}"><i class=""></i>Registered Reviewers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('conference-paper/'.$c->id) }}"><i class=""></i>Conference Papers</a>
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
                        <th>Scopes</th>
                        <th>Paper Section</th>
                        <th>Review Section</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach($data as $data)

                    <tr class="table-info">
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->scopes }}</td>
                        <td>
                            <a class="btn rounded-pill btn-secondary" href="{{url('paper-details/'.$data->id)}}">View Details</a>
                            <a class="btn rounded-pill btn-info" href="{{url('download/'.$data->file)}}">Download</a>
                        </td>
                        <td>
                            <a class="btn rounded-pill btn-dark" href="{{url('reviewer-form/'.$data->id)}}">Assign Reviewer</a>
                            <a class="btn rounded-pill btn-success" href="{{url('show-review/'.$data->id)}}">Reviews</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection