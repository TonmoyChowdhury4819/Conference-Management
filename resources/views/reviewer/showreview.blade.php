@extends('dashboard.layouts.reviewerdefault')
@section('abc')

<div class="col-md-12">
    @foreach($data as $d)
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('reviewer-dashboard/'.$d->paper_id) }}"><i class=""></i>Papers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('paper-description/'.$d->paper_id) }}"><i class=""></i>Paper Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ url('show-my-review/'.$d->id) }}"><i class=""></i>My Review</a>
        </li>
    </ul>
    @endforeach

    <div class="card">
        @foreach($data as $data)
        <div class="card-body">
            <p><b>Conference ID:</b> {{ $data->conference_id }}<br></p>
            <p><b>Paper ID:</b> {{ $data->paper_id }}<br></p>
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