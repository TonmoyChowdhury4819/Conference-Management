@extends('dashboard.layouts.superadmindefault')
@section('abc')

<div class="card">
    <h5 class="card-header">Pending Requests</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr class="table-active">
                    <th>#</th>
                    <th>Salutation</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Approval</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                @foreach($user as $u)

                <tr class="table-info">
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->salutation }}</td>
                    <td>{{ $u->first_name}}</td>
                    <td>{{ $u->last_name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->password }}</td>
                    <td>{{ $u->status }}</td>
                    <td>{{ $u->gender }}</td>
                    <td>{{ $u->role }}</td>
                    <td>{{ $u->address }}</td>
                    <td>{{ $u->country }}</td>

                    <td>
                        <a class="btn rounded-pill btn-primary" href="{{ url('accept-user/'.$u->id) }}"><i class="bx bx-edit-alt me-1"></i> Accept</a>
                        <a class="btn rounded-pill btn-danger" data-bs-toggle="modal" data-bs-target="#smallModal{{ $u->id }}"><i class="bx bx-trash me-1"></i>Decline</a>
                        <div class="modal fade" id="smallModal{{ $u->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to decline {{ $u->first_name }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger btn-fw" data-bs-dismiss="modal">
                                            Yes
                                        </button>
                                        <a class="btn btn-outline-success btn-fw" href="{{ url('delete-user/'.$u->id) }}">Close</a>
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
@endsection