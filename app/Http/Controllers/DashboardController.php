<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\File;

class DashboardController extends Controller
{
    public function superadmindashboard()
    {
        $data = DB::table('conferenceadmin')->get();
        return view('dashboard.pages.superadmin_dashboard', ['conferenceadmin' => $data]);
    }
    public function admindashboard($id)
    {
        $data = DB::table('conferenceadmin')->where('id', '=', $id)->get();
        return view('dashboard.pages.admin_dashboard', ['conferenceadmin' => $data]);
    }
    public function authordashboard(){
        $data = DB::table('conferences')->get();
        return view('dashboard.pages.author_dashboard',['conferences' => $data]);
    }
    public function reviewerdashboard($id){
        $paper = File::where('id','=',$id)->get();
        return view('dashboard.pages.reviewer_dashboard', compact('paper'));
    }
}
