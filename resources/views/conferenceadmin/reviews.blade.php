@extends('dashboard.layouts.admindefault')
@section('abc')
<div class="col-md-12">
    @foreach($result as $r)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin-dashboard/'.$r->admin_id) }}"><i class=""></i>My Conferences</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('registered-reviewers/'.$r->conference_id) }}"><i class=""></i>Registered Reviewers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('conference-paper/'.$r->id) }}"><i class=""></i>Conference Papers</a>
        </li>
    </ul>
    @endforeach

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th>Review</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach($data as $data)

                    <tr class="table-info">
                        <td>Review-{{ $data->id }}<br></td>
                        <td>
                            <a href="{{url('see-review/'.$data->id)}}">
                                <button type="button" class="btn btn-warning">See Review</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </div>
    </div>
</div>
@endsection