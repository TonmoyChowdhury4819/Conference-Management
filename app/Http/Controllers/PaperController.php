<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\DB;
use App\Models\File;
use App\Models\Scope;
use App\Models\Review;

class PaperController extends Controller
{
    public function uploadpapers($id)
    {
        $data = DB::table('conferences')->where('id', '=', $id)->get();
        $scopes=scope::where('conference_id','=',$id)->get();
        return view('author.papers', ['scopes' => $scopes, 'conferences' => $data]);
    }

    public function storepapers(Request $request)
    {

        $data=new file();

        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('assets',$filename);
        $data->file=$filename;

        $data->conference_id=$request->conference_id;
        $data->admin_id=$request->admin_id;
        $data->title=$request->title;
        $data->abstract=$request->abstract;
        $data->keyword=$request->keyword;
        $data->scopes=$request->scopes;

        $data->save();
        return redirect()->back()->with('success','Paper Uploaded Successfully');
    }

    public function show($id)
    {
        $conferences = DB::table('conferences')->where('id', '=', $id)->get();
        $data=file::where('conference_id','=',$id)->get();
        return view('conferenceadmin.showpapers',compact('data'), compact('conferences'));
    }

    public function paperdetails($id)
    {
        $data=file::where('id','=',$id)->get();
        return view('conferenceadmin.paperdetails',compact('data'));
    }

    public function paperdescription($id)
    {
        $data=file::where('id','=',$id)->get();
        return view('reviewer.paperdescription',compact('data'));
    }

    public function download(Request $request,$file)
    {
       return response()->download(public_path('assets/'.$file));
    }

    public function view($id)
    {
       $data=File::where('id','=',$id)->get();
       return view('conferenceadmin.viewpapers',compact('data'));
    }

    /*public function submittedpapers()
    {
        $data=file::all();
        return view('author.submittedpapers',compact('data'));
    }

    public function authorview($id)
    {
       $data=File::find($id);
       return view('author.authorviewpapers',compact('data'));
    }*/

    public function reviewerview($id)
    {
        $data=File::where('id','=',$id)->get();
        return view('reviewer.reviewerviewpapers',compact('data'));
    }

    public function paperreview($id)
    {
        $data=File::where('id','=',$id)->get();
        return view('reviewer.reviewpaper', compact('data'));
    }

    public function storereview(Request $request)
    {
        $data=new review();
        $data->admin_id=$request->admin_id;
        $data->conference_id=$request->conference_id;
        $data->paper_id=$request->paper_id;
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
        return redirect('show-my-review/'.$data->id);
    }

    public function myreview($id)
    {
        $data=review::where('id','=',$id)->get();
        return view('reviewer.showreview',compact('data'));
    }

    public function showreview($id)
    {
        $result = File::where('id','=',$id)->get();
        $data=review::where('paper_id','=',$id)->get();
        return view('conferenceadmin.reviews',compact('data','result'));
    }
    
    public function seereview($id)
    {
        $data=review::where('id','=',$id)->get();
        return view('conferenceadmin.seereview',compact('data'));
    }
}
