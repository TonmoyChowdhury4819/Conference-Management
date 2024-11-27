@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="container">
    <form action="{{ url('store-scopes') }}" method="POST">
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
        <table class="table table-bordered" id="dynamicForm">
            <tr>
                <th scope="col" class="px-6 py-3">Scopes</th>
                <th scope="col" class="px-6 py-3">Conference ID</th>
                <th>Action</th>
            </tr>
            <tr>
                <td><input type="text" name="addInputFields[0][scopes]" placeholder="Enter Scopes" class="form-control" />
                </td>
                @foreach($conferences as $c)
                <td><input type="text" name="addInputFields[0][conference_id]" placeholder="Enter conference id" class="form-control" value="{{ $c->id }}" />
                </td>
                @endforeach
                <td><button type="button" name="add" id="dynamic-arr" class="btn btn-outline-primary">+Add</button></td>
            </tr>
        </table>
        <div class="mt-2">
            <button type="submit" class="btn btn-outline-success btn-block">Save</button>
            <a href="{{ url('conference/'.$c->admin_id) }}">
                <button type="button" class="btn btn-outline-secondary">Back</button>
            </a>
        </div>
    </form>
</div>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-arr").click(function() {
        ++i;
        $("#dynamicForm").append('<tr><td><input type="text" name="addInputFields[' + i +
            '][scopes]" placeholder="Enter scopes" class="form-control" /></td><td><input type="text" name="addInputFields[' + i +
            '][conference_id]" placeholder="Enter conference id" class="form-control" value="{{ $c->id }}" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
        );
    });
    $(document).on('click', '.remove-input-field', function() {
        $(this).parents('tr').remove();
    });
</script>
@endsection