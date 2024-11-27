@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="col-md-12">
    @foreach($conferences as $c)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin-dashboard/'.$c->admin_id) }}"><i class=""></i>My Conference</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('create-conference/'.$c->admin_id) }}"><i class=""></i>+Add Conference Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('conference/'.$c->id) }}"><i class=""></i>Conference Info</a>
        </li>
    </ul>
    @endforeach

    <div class="card">
        @foreach($conferences as $c)
        <h2 class="card-header">{{ $c->title }}</h2>
        <div class="card-body">
            <p>{{ $c->description }}</p>
            @endforeach
        </div>
        <h4 class="card-header">Conference Domains</h4>
        <div class="card-body">
            <ol type="1">
                @foreach($scopes as $s)
                <li>{{ $s->scopes }}</li>
                @endforeach
            </ol>
        </div>
    </div>
    @endsection