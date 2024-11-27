<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function storeregister(Request $req)
    {
        $name = $req->name;
        $email = $req->email;
        $password = $req->password;
        $confirm_pass = $req->confirm;

        if ($password != $confirm_pass) {
            return redirect()->back()->with('err', 'Password Mismatch');
        } else {
            DB::table('admin')->insert([
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'role' => 'admin',
                'is_approved' => '1'
            ]);
            return redirect()->back()->with('success', 'Registration Successful.');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function storelogin(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        $admin = DB::table('admin')
            ->where('email', '=', $email)
            ->where('password', '=', md5($password))->first();

        if ($admin) {
            //Session::put('adminname', $admin->name);
            //Session::put('adminrole', $admin->role);

            $req->session()->put('adminname', $admin->name);
            $req->session()->put('adminrole', $admin->role);

            return redirect('superadmin-dashboard');
        }
    }


    public function userregister()
    {
        return view('auth.registeruser');
    }

    public function storeuser(Request $req)
    {
        $country = $req->country;
        $salutation = $req->salutation;
        $status = $req->status;
        $first_name = $req->first_name;
        $last_name = $req->last_name;
        $address = $req->address;
        $gender = $req->gender;
        $email = $req->email;
        $password = $req->password;
        $confirm_pass = $req->confirm;
        $role = $req->role;

        if ($password != $confirm_pass) {
            return redirect()->back()->with('err', 'Password Mismatch');
        } else {
            DB::table('user')->insert([
                'salutation' => $salutation,
                'status' => $status,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'password' => md5($password),
                'address' => $address,
                'gender' => $gender,
                'role' => $role,
                'country' => $country,
            ]);
            return redirect()->back()->with('success', 'Registered Successfully.Waiting For Admin Approval');
        }
    }

    public function userlogin()
    {
        return view('auth.userlogin');
    }

    public function storeuserlogin(Request $req)
    {
        $email = $req->email;
        $password = $req->password;

        $user = DB::table('user')
            ->where('email', '=', $email)
            ->where('password', '=', md5($password))->first();

        if ($user) {
            if ($user->is_approved == 0) {
                return redirect()->back()->with('err', 'Not Approved');
            } else {
                $req->session()->put('first_name', $user->first_name);
                $req->session()->put('userrole', $user->role);
                return redirect('author-dashboard');
            }
        }
    }

    public function registereduser()
    {
        $data = DB::table('user')->where('is_approved', '=', '1')->get();
        return view('auth.alluser', ['user' => $data]);
    }

    public function edituser($id)
    {
        $result = DB::table('user')->where('id', '=', $id)->first(); //select * from user  where id=...
        return view('auth.edituser', ['user' => $result]);
    }

    public function updateuser(Request $req, $id)
    {
        $country = $req->country;
        $salutation = $req->salutation;
        $status = $req->status;
        $first_name = $req->first_name;
        $last_name = $req->last_name;
        $address = $req->address;
        $email = $req->email;
        $password = $req->password;
        $role = $req->role;
        $is_approved = $req->is_approved;

        $affeected = DB::table('user')
            ->where('id', '=', $id)
            ->update([
                'country' => $country,
                'salutation' => $salutation,
                'status' => $status,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'address' => $address,
                'email' => $email,
                'password' => md5($password),
                'role' => $role,
                'is_approved' => $is_approved
            ]);
        return redirect('registered-user');
    }

    public function deleteuser($id)
    {
        $deleted = DB::table('user')->where('id', '=', $id)->delete();
        return redirect('registered-user');
    }

    public function pendinguser()
    {
        $data = DB::table('user')->where('is_approved', '=', '0')->get();
        return view('auth.pendinguser', ['user' => $data]);
    }

    public function acceptuser($id)
    {
        $affected = DB::table('user')->where('id', '=', $id)->update(['is_approved' => '1']);
        return redirect('registered-user');
    }
}
