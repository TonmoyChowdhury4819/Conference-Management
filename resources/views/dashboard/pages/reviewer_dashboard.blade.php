@extends('dashboard.layouts.reviewerdefault')
@section('abc')

<div class="col-md-12">
    @foreach($paper as $p)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('reviewer-dashboard/'.$p->conference_id) }}"><i class=""></i>Papers</a>
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

                    @foreach($paper as $paper)

                    <tr class="table-info">
                        <td>{{ $paper->id }}</td>
                        <td>{{ $paper->title }}</td>
                        <td>{{ $paper->scopes }}</td>
                        <td>
                            <a class="btn rounded-pill btn-secondary" href="{{url('paper-description/'.$paper->id)}}">View Details</a>
                            <a class="btn rounded-pill btn-info" href="{{url('download/'.$paper->file)}}">Download</a>
                        </td>
                        <td>
                            <a class="btn rounded-pill btn-warning" href="{{url('reviewer-paper-review/'.$paper->id)}}">Review Paper</a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection