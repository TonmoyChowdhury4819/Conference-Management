<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ConferenceAdminController extends Controller
{
    public function conference_adminregister()
    {
        return view('conferenceadmin.register');
    }
    public function storeconference_adminregister(Request $req)
    {
        $conference_id = $req->conference_id;
        $title = $req->title;
        $short_name = $req->short_name;
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $confirm_pass = $req->confirm;

        if ($password != $confirm_pass) {
            return redirect()->back()->with('err', 'Password Mismatch');
        } else {
            DB::table('conferenceadmin')->insert([
                'conference_id' => $conference_id,
                'title' => $title,
                'short_name' => $short_name,
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'role' => 'conferenceadmin',
            ]);
            return redirect('all-coadmin')->with('success', 'Registration Successful.');
        }
    }
    public function conferenceadminlogin()
    {
        return view('conferenceadmin.login');
    }
    public function store_coadminlogin(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        $conferenceadmin = DB::table('conferenceadmin')
            ->where('email', '=', $email)
            ->where('password', '=', md5($password))->first();

            if ($conferenceadmin) {
                    //Session::put('adminname', $admin->name);
                    //Session::put('adminrole', $admin->role);
    
                    $req->session()->put('coadminname', $conferenceadmin->name);
                    $req->session()->put('coadminrole', $conferenceadmin->role);
                    
                    return redirect('admin-dashboard/'.$conferenceadmin->id);
                }
            
    }
    public static function all_coadmin()
    {
        $data = DB::table('conferenceadmin')->get();
        return view('conferenceadmin.allcoadmin', ['conferenceadmin' => $data]);
    }
    public function editcoadmin($id)
    {
        $result = DB::table('conferenceadmin')->where('id', '=', $id)->first();
        return view('conferenceadmin.editcoadmin', ['conferenceadmin' => $result]);
    }
    public function updatecoadmin(Request $req, $id)
    {
        $title = $req->title;
        $short_name = $req->short_name;
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;

        $affeected = DB::table('conferenceadmin')
            ->where('id', '=', $id)
            ->update([
                'title' => $title,
                'short_name' => $short_name,
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
            ]);
        return redirect('all-coadmin');
    }
    public function deletecoadmin($id)
    {
        $deleted = DB::table('conferenceadmin')->where('id', '=', $id)->delete();
        return redirect('all-coadmin');
    }
}
