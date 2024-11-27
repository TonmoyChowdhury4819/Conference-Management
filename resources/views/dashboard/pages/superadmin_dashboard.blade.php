@extends('dashboard.layouts.superadmindefault')
@section('abc')

<div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('superadmin-dashboard') }}"><i class=""></i>Conference's Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('conference-admin-register') }}"><i class=""></i>+Add New Co-Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('all-coadmin') }}"><i class=""></i>Conference's Admin Info</a>
        </li>
    </ul>
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th>Conference ID</th>
                        <th>Conference Title</th>
                        <th>Short Name</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($conferenceadmin as $a)
                    <tr class="table-info">
                        <td>{{ $a->conference_id }}</td>
                        <td>{{ $a->title}}</td>
                        <td>{{ $a->short_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection