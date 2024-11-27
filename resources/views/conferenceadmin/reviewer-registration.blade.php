@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="col-md-12">
    @foreach($paper as $p)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin-dashboard/'.$p->admin_id) }}"><i class=""></i>My Conference</a>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('reviewer-form/'.$p->id) }}"><i class=""></i>Assign Reviewer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('registered-reviewers/'.$p->conference_id) }}"><i class=""></i>Registered Reviewer</a>
        </li>
    </ul>
    @endforeach

    <div class="container">
        <form action="{{ url('store-input-fields') }}" method="POST">
            {{ csrf_field() }}
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif

            <table class="table table-bordered" id="dynamicAddRemove">
                <thead>
                    <tr class="table-active">
                        <th scope="col" class="px-4 py-3">Conference ID</th>
                        <th scope="col" class="px-4 py-3">Paper ID</th>
                        <th scope="col" class="px-4 py-3">Name</th>
                        <th scope="col" class="px-4 py-3">Email</th>
                        <th scope="col" class="px-4 py-3">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr class="table-info">
                        @foreach($paper as $p)
                        <td><input type="text" name="conference_id[]" class="form-control" value="{{ $p->conference_id }}"></td>
                        @endforeach
                        @foreach($paper as $p)
                        <td><input type="text" name="paper_id[]" class="form-control" value="{{ $p->id }}"></td>
                        @endforeach
                        <td><input type="text" name="name[]" class="form-control name"></td>
                        <td><input type="email" name="email[]" class="form-control email"></td>
                        <td><input type="password" name="password[]" class="form-control password"></td>
                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-success"><i class="fa fa-plus"></i></button></td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4">
                <button class="btn btn-outline-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dynamic-ar').click(function() {
            addRow();
        });

        function addRow() {
            var addRow = '<tr class="table-info">\n' + '@foreach($paper as $p)\n' +
                '<td><input type="text" name="conference_id[]" class="form-control" value="{{ $p->conference_id }}"></td>\n' +
                '@endforeach\n' + '@foreach($paper as $p)\n' + '<td><input type="text" name="paper_id[]" class="form-control" value="{{ $p->id }}"></td>\n' +
                '@endforeach\n' + '<td><input type="text" name="name[]" class="form-control name"></td>\n' +
                '<td><input type="email" name="email[]" class="form-control email"></td>\n' +
                '<td><input type="password" name="password[]" class="form-control password"></td>\n' +
                '<td><button type="button" class="btn btn-danger remove"><i class="fa fa-remove"></i></button></td>\n' + '</tr>';
            $('tbody').append(addRow);
        };
    });

    $('.remove').on('click', function() {
        remove();
    });

    $(document).on('click', '.remove', function() {
        $(this).parents('tr').remove();
    });
</script>
@endsection