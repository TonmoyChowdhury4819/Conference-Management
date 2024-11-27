@extends('dashboard.layouts.admindefault')
@section('abc')

<div class="col-md-12">
<div class="col-md-12">
    @foreach($data as $d)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin-dashboard/'.$d->admin_id) }}"><i class=""></i>My Conferences</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('registered-reviewers/'.$d->conference_id) }}"><i class=""></i>Registered Reviewers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('conference-paper/'.$d->conference_id) }}"><i class=""></i>Conference Papers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('see-review/'.$d->id) }}"><i class=""></i>Conference Papers</a>
        </li>
    </ul>
    @endforeach

    <div class="card">
        @foreach($data as $data)
        <div class="card-body">
            <p><b>Relevance To The Conference:</b> {{ $data->relevance }}<br></p>
            <p><b>Contribution to academic debate:</b> {{ $data->contribution }}<br></p>
            <p><b>Structure of the paper:</b> {{ $data->structure }}<br></p>
            <p><b>Standard of English:</b> {{ $data->standard }}<br></p>
            <p><b>Appropriateness of the research:</b> {{ $data->studymethod }}<br></p>
            <p><b>Relevance and clarity of drawings, graphs and tables:</b> {{ $data->relevanceclarity }}<br></p>
            <p><b>Appropriateness of abstract as a description of the paper:</b> {{ $data->abstract }}<br></p>
            <p><b>Use and number of keywords:</b> {{ $data->keyphrases }}<br></p>
            <p><b>Discussion and conclusions:</b> {{ $data->discussion }}<br></p>
            <p><b>Reference list, adequate and correctly cited:</b> {{ $data->reference }}<br></p>
            <p><b>Comments:</b><br> {{ $data->comments }}<br></p>
            <p><b>Accepted?</b><br> {{ $data->status }}<br></p>
            @endforeach
        </div>

    </div>
</div>
@endsection