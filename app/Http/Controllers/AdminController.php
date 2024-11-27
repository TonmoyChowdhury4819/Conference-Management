<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function superadmin_profile()
    {
        $data = DB::table('admin')->get(); //Select * From admin table
        return view('auth.superadmin_profile', ['admin' => $data]);
    }

    public function editadmin($id)
    {
        $result = DB::table('admin')->where('id', '=', $id)->first(); //select * from admin  where id=...
        return view('auth.editadmin', ['admin' => $result]);
    }

    public function updateadmin(Request $req, $id)
    {
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;

        $affeected = DB::table('admin')
            ->where('id', '=', $id)
            ->update([
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
            ]);
        return redirect('superadmin-profile');
    }

    public function deleteadmin($id)
    {
        $deleted = DB::table('admin')->where('id', '=', $id)->delete();
        return redirect('all-admin');
    }

}

