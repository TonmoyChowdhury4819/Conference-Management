@extends('dashboard.layouts.reviewerdefault')
@section('abc')

<div class="row">
    <div class="col-md-12">
        @foreach($data as $d)
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('reviewer-dashboard/'.$d->id) }}"><i class=""></i>Papers</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link active" href="{{ url('reviewer-paper-review/'.$d->id) }}"><i class=""></i>Review Paper</a>
            </li>
        </ul>
        @endforeach

        <div class="card mb-4">
            <hr class="my-0">
            <div class="card-body">
                <form method="POST" action="{{ url('store-review') }}">
                    {{ csrf_field() }}
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Admin ID</label>
                        @foreach($data as $d)
                        <input class="form-control" type="text" name="admin_id" value="{{ $d->admin_id }}">
                        @endforeach
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Conference ID</label>
                        @foreach($data as $d)
                        <input class="form-control" type="text" name="conference_id" value="{{ $d->conference_id }}">
                        @endforeach
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Paper ID</label>
                        @foreach($data as $d)
                        <input class="form-control" type="text" name="paper_id" value="{{ $d->id }}">
                        @endforeach
                    </div>
                    <div class="row">
                        <h5 class="card-header"><b>Please rate the following:</b></h5>
                        <hr class="my-0">
                        <br>
                        <label class="" for="basic-default-name"><b>1.Relevance To The Conference</b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevance" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevance" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevance" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevance" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevance" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>2.Contribution to academic debate</b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="contribution" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="contribution" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="contribution" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="contribution" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="contribution" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>3.Structure of the paper</b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="structure" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="structure" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="structure" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="structure" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="structure" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>4.Standard of English</b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="standard" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="standard" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="standard" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="standard" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="standard" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>5.Appropriateness of the research/study method
                            </b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="studymethod" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="studymethod" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="studymethod" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="studymethod" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="studymethod" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>6.Relevance and clarity of drawings, graphs and tables</b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevanceclarity" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevanceclarity" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevanceclarity" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevanceclarity" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="relevanceclarity" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>7.Appropriateness of abstract as a description of the paper</b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="abstract" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="abstract" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="abstract" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="abstract" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="abstract" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>8.Use and number of keywords/key phrases</b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="keyphrases" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="keyphrases" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="keyphrases" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="keyphrases" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="keyphrases" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>9.Discussion and conclusions
                            </b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="discussion" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="discussion" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="discussion" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="discussion" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="discussion" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>10.Reference list, adequate and correctly cited</b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="reference" value="Excellent" />
                                <label class="form-check-label">Excellent</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="reference" value="Good" />
                                <label class="form-check-label">Good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="reference" value="Average" />
                                <label class="form-check-label">Average</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="reference" value="Not good" />
                                <label class="form-check-label">Not good</label>
                            </div>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="reference" value="Poor" />
                                <label class="form-check-label">Poor</label>
                            </div>
                        </div>
                        <br><br>
                        <h5 class="card-header"><b>Specific reviewer comments to be passed to the author/s. Please expand on any weak areas in
                                the checklist and offer specific advice as to how the author(s) may improve the paper.</b>
                        </h5>
                        <hr class="my-0">
                        <div class="">
                            <label class="form-label"></label>
                            <textarea class="form-control" name="comments" rows="3"></textarea>
                        </div>
                        <br><br>
                        <label class="" for="basic-default-name"><b>Should this paper be accepted for presentation at the conference?</b>
                        </label>
                        <div class="col-sm-10">
                            <div class="form-check form-check mt-3">
                                <input class="form-check-input" type="radio" name="status" value="Yes_no_changes" />
                                <label class="form-check-label">Yes-no changes</label>
                            </div>
                            <div class="form-check form-check mt-3">
                                <input class="form-check-input" type="radio" name="status" value="Yes_with_minor_revisions" />
                                <label class="form-check-label">Yes-with minor revisions</label>
                            </div>
                            <div class="form-check form-check mt-3">
                                <input class="form-check-input" type="radio" name="status" value="Yes_with_major_revisions" />
                                <label class="form-check-label">Yes-with major revisions</label>
                            </div>
                            <div class="form-check form-check mt-3">
                                <input class="form-check-input" type="radio" name="status" value="No" />
                                <label class="form-check-label">No</label>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection