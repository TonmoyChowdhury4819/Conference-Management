@extends('dashboard.layouts.reviewerdefault')
@section('abc')

<div class="col-md-12">
@foreach($data as $d)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('reviewer-dashboard/'.$d->id) }}"><i class=""></i>Papers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('paper-description/'.$d->id) }}"><i class=""></i>Paper Details</a>
        </li>
    </ul>
    @endforeach

    <div class="card">
    @foreach($data as $data)
        <h2 class="card-header">Paper Details</h2>
        
        <div class="card-body">
        
            <p><b>Title:</b> {{ $data->title }}<br></p>
            <p><b>Abstract:</b><br>{{ $data->abstract }}<br></p>
            <p><b>Keywords:</b> {{ $data->keyword }}<br></p>
            <div class="mt-4">
                <a href="{{ url('reviewer-view/'.$data->id) }}">
                    <button type="button" class="btn btn-secondary">View Paper</button>
                </a>
            </div>
          @endforeach  
        </div>
        
    </div>
</div>
@endsection