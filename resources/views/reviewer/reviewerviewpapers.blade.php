@extends('dashboard.layouts.reviewerdefault')
@section('abc')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Info</title>
</head>

<body>
    @foreach($data as $d)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('reviewer-dashboard/'.$d->id) }}"><i class=""></i>Papers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('paper-description/'.$d->id) }}"><i class=""></i>Paper Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('reviewer-view/'.$d->id) }}"><i class=""></i>View Paper</a>
        </li>
    </ul>
    @endforeach

    @if($data)
    @foreach($data as $data)
    <iframe height="1000" width="1000" src="/assets/{{$data->file}}"></iframe>
    @endforeach
    @endif
</body>

</html>
@endsection