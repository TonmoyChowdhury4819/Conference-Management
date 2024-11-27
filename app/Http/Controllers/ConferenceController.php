<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scope;
use Illuminate\Support\Facades\DB;

class ConferenceController extends Controller
{
    public function create($id)
    {
        $data = DB::table('conferenceadmin')->where('id', '=', $id)->get();
        return view('conferences.create', ['conferences' => $data]);
    }

    public function store(Request $req)
    {
        $id = $req->id;
        $title = $req->title;
        $short_name = $req->short_name;
        $url = $req->url;
        $description = $req->description;
        $start_date = $req->start_date;
        $end_date = $req->end_date;
        $submission_deadline = $req->submission_deadline;
        $acceptance = $req->acceptance;
        $camera_ready = $req->camera_ready;
        $registration = $req->registration;
        $admin_id = $req->admin_id;

        //Insert the values in database table
        DB::table('conferences')->insert([
            'id' => $id,
            'title' => $title,
            'short_name' => $short_name,
            'url' => $url,
            'description' => $description,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'submission_deadline' => $submission_deadline,
            'acceptance' => $acceptance,
            'camera_ready' => $camera_ready,
            'registration' => $registration,
            'admin_id' => $admin_id
        ]);
        $data = DB::table('conferences')->where('id','=',$id)->first();
        return redirect('add-scopes/'.$data->id);
    }

    public function addscopes($id)
    {
        $data = DB::table('conferences')->where('id', '=', $id)->get();
        return view('conferences.addscopes', ['conferences' => $data]);
    }

    public function store_scopes(Request $request)
    {
        $request->validate([
            'addInputFields.*.scopes' => 'required',
            'addInputFields.*.conference_id' => 'required',
        ]);

        foreach ($request->addInputFields as $key => $value) {
            Scope::create($value);
        }
        return redirect()->back()->with('success', 'Scopes Added Successfuly.');
    }

      public function all($id)
    {
        $data = DB::table('conferences')->where('admin_id', '=', $id)->get(); //Select * From conferences table
        return view('conferences.all', ['conferences' => $data]);
    }

    public function viewconference($id)
    {
        $data = DB::table('conferences')->where('id', '=', $id)->get(); //Select * From conferences table
        $scopes = Scope::where('conference_id', '=', $id)->get();
        return view('conferences.viewdescription', ['conferences' => $data, 'scopes' => $scopes]);
    }

    public function description_author($id)
    {
        $data = DB::table('conferences')->where('id', '=', $id)->get(); //Select * From conferences table
        $scopes = Scope::where('conference_id', '=', $id)->get();
        return view('author.conference_description', ['conferences' => $data, 'scopes' => $scopes]);
    }

    public function edit($id)
    {
        $result = DB::table('conferences')->where('id', '=', $id)->first(); //select * from conferences  where id=...
        return view('conferences.edit', ['conferences' => $result]);
    }

    public function update(Request $req, $id)
    {
        $id = $req->id;
        $title = $req->title;
        $short_name = $req->short_name;
        $url = $req->url;
        $description = $req->description;
        $start_date = $req->start_date;
        $end_date = $req->end_date;
        $submission_deadline = $req->submission_deadline;
        $acceptance = $req->acceptance;
        $camera_ready = $req->camera_ready;
        $registration = $req->registration;
        $admin_id = $req->admin_id;

        $affected = DB::table('conferences')
            ->where('id', '=', $id)
            ->update([
                'id' => $id,
                'title' => $title,
                'short_name' => $short_name,
                'url' => $url,
                'description' => $description,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'submission_deadline' => $submission_deadline,
                'acceptance' => $acceptance,
                'camera_ready' => $camera_ready,
                'registration' => $registration,
                'admin_id' => $admin_id
            ]);
            return redirect()->back()->with('success', 'Conference Updated Successfuly');
    
    }

    public function delete($id)
    {
        $deleted = DB::table('conferences')->where('id', '=', $id)->delete();
        return redirect('conference');
    }

    public function question()
    {
        return view('conferences.question');
    }
}
