@extends('dashboard.layouts.authordefault')
@section('abc')
<!DOCTYPE html>
<html>

<head>
    <title>File Upload</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-body">
                @foreach($conferences as $c)
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('author-dashboard') }}"><i class=""></i>All Conferences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('upload-papers/'.$c->id) }}"><i class=""></i>Paper Upload</a>
                    </li>
                </ul>
                @endforeach

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif

                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card mb-4">
                    <hr class="my-0">
                    <div class="card-body">
                        <form action="{{url('store-papers')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Abstract</label>
                                    <textarea type="text" name="abstract" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Keyword</label>
                                    <input type="text" name="keyword" class="form-control">
                                </div>
                                <div class="mb-3 col-md-6">
                                    @foreach($conferences as $c)
                                    <label class="form-label">Conference ID</label>
                                    <input type="text" name="conference_id" class="form-control" value="{{ $c->id }}">
                                    @endforeach
                                </div>
                                <div class="mb-3 col-md-6">
                                    @foreach($conferences as $c)
                                    <label class="form-label">Co-Admin ID</label>
                                    <input type="text" name="admin_id" class="form-control" value="{{ $c->admin_id }}">
                                    @endforeach
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Select Scopes</label>
                                    <select name="scopes" id="scopes" class="form-control">
                                        <option value="">Select Scopes</option>
                                        @foreach($scopes as $s)
                                        <option value="{{ $s->scopes }}">{{ $s->scopes }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="">
                                    <label class="form-label">Select Files</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-success">Upload Files..</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection