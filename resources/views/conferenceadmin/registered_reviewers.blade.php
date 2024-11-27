@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="col-md-12">
    @foreach($nav as $n)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin-dashboard/'.$n->admin_id) }}"><i class=""></i>My Conference</a>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('registered-reviewers/'.$n->conference_id) }}"><i class=""></i>Registered Reviewer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('conference-paper/'.$n->conference_id) }}"><i class=""></i>Conference Papers</a>
        </li>
    </ul>
    @endforeach

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="table-active">
                        <th>#</th>
                        <th>Paper ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">

                    @foreach($result as $result)

                    <tr class="table-info">
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->paper_id }}</td>
                        <td>{{ $result->name }}</td>
                        <td>{{ $result->email }}</td>
                        <td>
                            <a class="btn rounded-pill btn-primary" href="{{ url('edit-reviewer/'.$result->id) }}"><i class="bx bx-edit-alt me-1"></i></a>
                            <a class="btn rounded-pill btn-danger" data-bs-toggle="modal" data-bs-target="#smallModal{{ $result->id }}"><i class="bx bx-trash me-1"></i></a>
                            <div class="modal fade" id="smallModal{{ $result->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Delete Confirmation</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to delete {{ $result->name }}?
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-outline-danger btn-fw" href="{{ route('delete',[$result['id'],$result['conference_id']]) }}">Yes</a>
                                            <button type="button" class="btn btn-outline-success btn-fw" data-bs-dismiss="modal">
                                                Close
                                            </button>
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