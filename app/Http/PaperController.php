<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\DB;
use App\Models\File;
use App\Models\Review;

class PaperController extends Controller
{
    public function uploadpapers()
    {
        return view('conferences.papers');
    }

    public function storepapers(Request $request)
    {

        $data=new file();

        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('assets',$filename);
        $data->file=$filename;

        $data->title=$request->title;
        $data->abstract=$request->abstract;
        $data->keyword=$request->keyword;
        $data->scopes=$request->scopes;

        $data->save();
        return redirect()->back();

    }

    public function show()
    {
        $data=file::all();
        return view('conferences.showpapers',compact('data'));
    }

    public function download(Request $request,$file)
    {
       return response()->download(public_path('assets/'.$file));
    }

    public function view($id)
    {
       $data=File::find($id);
       return view('conferences.viewpapers',compact('data'));
    }

    public function submittedpapers()
    {
        $data=file::all();
        return view('author.submittedpapers',compact('data'));
    }

    public function authorview($id)
    {
       $data=File::find($id);
       return view('author.authorviewpapers',compact('data'));
    }

    public function showpapers()
    {
        $data=file::all();
        return view('reviewer.showpapers',compact('data'));
    }

    public function reviewerview($id)
    {
       $data=File::find($id);
       return view('reviewer.reviewerviewpapers',compact('data'));
    }

    public function paperreview()
    {
        return view('reviewer.reviewpapers');
    }

    public function storereview(Request $request)
    {
        $data=new review();

        $data->relevance=$request->relevance;
        $data->contribution=$request->contribution;
        $data->structure=$request->structure;
        $data->standard=$request->standard;
        $data->studymethod=$request->studymethod;
        $data->relevanceclarity=$request->relevanceclarity;
        $data->abstract=$request->abstract;
        $data->keyphrases=$request->keyphrases;
        $data->discussion=$request->discussion;
        $data->reference=$request->reference;
        $data->comments=$request->comments;
        $data->status=$request->status;

        $data->save();
        return redirect()->back();
    }

    public function showreview()
    {
        $data=review::all();
        return view('conferences.showreview',compact('data'));
    }


}
