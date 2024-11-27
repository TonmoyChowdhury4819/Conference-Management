<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Reviewer;
use App\Models\File;
use Illuminate\Support\Facades\DB;

class ReviewerController extends Controller
{
    public function register_reviewer($id)
    {
        $paper = File::where('id', '=', $id)->get();
        return view('conferenceadmin.reviewer-registration', compact('paper'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'conference_id' => 'required',
            'paper_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        foreach ($request->paper_id as $key => $paper_id) {
            $reviewer = new Reviewer();
            $reviewer->conference_id = $request->conference_id[$key];
            $reviewer->paper_id = $request->paper_id[$key];
            $reviewer->name = $request->name[$key];
            $reviewer->email = $request->email[$key];
            $reviewer->password = $request->password[$key];
            $reviewer->role = 'reviewer';
            $reviewer->save();
        }

        return redirect()->back()->with('success', 'New Reviwer Added Successfully.');
    }

    public function login()
    {
        return view('reviewer.login');
    }

    public function storelogin(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        $reviewer = DB::table('reviewers')
            ->where('email', '=', $email)
            ->where('password', '=', $password)->first();

        if ($reviewer) {
            if ($reviewer->role != 'reviewer') {
                return redirect()->back()->with('err', 'You are not registered');
            } else {
                $req->session()->put('reviewername', $reviewer->name);
                $req->session()->put('reviewerrole', $reviewer->role);

                return redirect('reviewer-dashboard/'.$reviewer->paper_id);
            }
        }
    }

    public function all_reviewers($id)
    {
        $result = Reviewer::where('conference_id','=',$id)->get();
        $nav = File::where('conference_id', '=', $id)->get();
        return view("conferenceadmin.registered_reviewers", compact('nav','result'));
    }

    public function edit($id)
    {
        $result = DB::table('reviewers')->where('id', '=', $id)->first(); //select * from user  where id=...
        return view('conferenceadmin.editreviewer', ['reviewer' => $result]);
    }

    public function update(Request $req, $id)
    {
        $conference_id = $req->conference_id;
        $scopes = $req->scopes;
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;

        $affected = DB::table('reviewers')
            ->where('id', '=', $id)
            ->update([
                'conference_id' => $conference_id,
                'scopes' => $scopes,
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
        $updated = DB::table('reviewers')->where('id', '=', $id)->first();
        return redirect('registered-reviewers/' . $updated->conference_id);
    }

    public function delete($id, $conference_id)
    {
        $deleted = DB::table('reviewers')->where('id', '=', $id)->delete();
        $data = Reviewer::where('conference_id', '=', $conference_id)->get();
        return redirect('registered-reviewers/' . $data->conference_id);
    }
}
