@extends('dashboard.layouts.superadmindefault')
@section('abc')
<div class="col-md-12">
  <ul class="nav nav-pills flex-column flex-md-row mb-3">
    <li class="nav-item">
      <a class="nav-link" href="{{ url('superadmin-dashboard') }}"><i class=""></i>Conference's Admin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('conference-admin-register') }}"><i class=""></i>+Add New Co-Admin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ url('all-coadmin') }}"><i class=""></i>Conference's Admin Info</a>
    </li>
  </ul>
  @if(Session::has('success'))
  <div class="alert alert-success">
    {{ Session::get('success') }}
  </div>
  @endif
  <div class="card">
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr class="table-active">
            <th>User Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Conference ID</th>
            <th>Conference Title</th>
            <th>Short Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($conferenceadmin as $a)
          <tr class="table-info">
            <td>{{ $a->id }}</td>
            <td>{{ $a->name}}</td>
            <td>{{ $a->email}}</td>
            <td>{{ $a->conference_id }}</td>
            <td>{{ $a->title}}</td>
            <td>{{ $a->short_name}}</td>
            <td>
              <a class="btn rounded-pill btn-primary" href="{{ url('edit-coadmin/'.$a->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              <a class="btn rounded-pill btn-danger" data-bs-toggle="modal" data-bs-target="#smallModal{{ $a->id }}"><i class="bx bx-trash me-1"></i>Delete</a>
              <div class="modal fade" id="smallModal{{ $a->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Confirmation</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Do you want to delete {{ $a->name }}?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-success btn-fw" data-bs-dismiss="modal">
                        Close
                      </button>
                      <a class="btn btn-outline-danger btn-fw" href="{{ url('delete-coadmin/'.$a->id) }}">Yes</a>
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