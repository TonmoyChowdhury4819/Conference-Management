@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="col-md-12">
    @foreach($conferenceadmin as $c)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('admin-dashboard/'.$c->id) }}"><i class=""></i>My Conference</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('create-conference/'.$c->id) }}"><i class=""></i>+Add Conference Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('conference/'.$c->id) }}"><i class=""></i>Conference Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('registered-reviewers/'.$c->conference_id) }}"><i class=""></i>Registered Reviewer</a>
        </li>
    </ul>
    @endforeach
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th>Conference ID</th>
                        <th>Conference Title</th>
                        <th>Short Name</th>
                        <th>Conference Papers</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach($conferenceadmin as $c)

                    <tr class="table-info">
                        <td>{{ $c->conference_id }}</td>
                        <td>{{ $c->title}}</td>
                        <td>{{ $c->short_name}}</td>
                        <td>
                            <a class="btn rounded-pill btn-info" href="{{url('conference-paper/'.$c->conference_id)}}">Papers</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection