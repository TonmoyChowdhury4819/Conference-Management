@extends('dashboard.layouts.superadmindefault')
@section('abc')

<div class="card">
    <h5 class="card-header">My Profile</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="table-active" >
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($admin as $a)
                <tr class="table-info">
                    <td>{{ $a->id }}</td>
                    <td>{{ $a->name}}</td>
                    <td>{{ $a->email}}</td>
                    <td>
                         <a class="btn rounded-pill btn-primary" href="{{ url('edit-admin/'.$a->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection