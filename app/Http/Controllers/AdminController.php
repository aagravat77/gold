<?php

namespace App\Http\Controllers;

use App\Models\Contactmodel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(Request $users)
    {
        $users = DB::table('users')->where('role', '=', 'user' ,'and', 'status','=','Active')->get();
        return view('Admin.Admin_Users', compact('users'));
    }
    public function contactdata(Request $users)
    {
        $users = DB::table('contactmodel')->get();
        return view('Admin.Admin_cotact', compact('users'));
    }
    public function deletecon($id)
    {
        $user = DB::table('contactmodel')->where('id', '=', $id)->first();
        if ($user) {
            DB::table('contactmodel')->where('id', '=', $id)->delete();
        }
        return
        back()->with('success', 'deleted Successfully');
    }
    public function delete($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();
        if ($user) {
            DB::table('users')->where('id', '=', $id)->update(['status'=>'Deactive']);
        }
        return redirect()->route('/admin_user');
    }
    public function admin_profile()
    {
        return view('Admin.Admin_profile');
    }
    public function admin_profile_post(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'name' => 'required|max:20|min:2',
                'number' => 'required|max:10|min:10',
                'sts' => 'required',


            ]
        );
        echo $id = $request->input('id');
        echo $a = $request->input('name');
        echo $b = $request->input('number');
        echo $c = $request->input('email');
        echo $d = $request->input('sts');


        $user = DB::table('users')->where('id', '=', $id)->first();
        if ($user) {
            DB::table('users')->where('id', '=', $id)->update(['name' => $a, 'number' => $b, 'email' => $c,"status"=>$d]);
        }
        return redirect('adminusers')->with('success', 'Profile Updated Successfully');
    }
    public function edit(Request $request, $id)
    {
        echo $id;
        $data = User::where('id', '=', $id)->get();
        return view('Admin.Admin_edit_user', compact('data'));
    }
    public function change_password()
    {
        return view('Admin.Admin_change_pass');
    }
    public function change_password_post(Request $request)
    {
        // echo $request;
        $request->validate(
            [
                'old' => 'required',
                'new' => 'required|min:8',
                'con' => 'required|same:new',
            ]
        );
        echo $id = $request->input('old');
        echo $a = $request->input('new');
        echo $b = $request->input('con');

        if (!Hash::check($request->old, auth()->user()->password)) {
            return back()->with("error", "old password is wrong");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->con),
            'repeat_password' => $request->con

        ]);
        return back()->with('success', 'Password changed Successfully');
        // $user = DB::table('users')->where('id', '=', $id)->first();
        // if ($user) {
        //     DB::table('users')->where('id', '=', $id)->update(['name' => $a, 'number' => $b]);
        // }
        // return back()->with('success', 'Profile Updated Successfully');
        // echo "updated";
        // return redirect()->route('/');
        // return view('User.user_profile');
    }
    public function contact(Request $request)
    {
        echo $a = $request->input('name');
        echo $c = $request->input('email');
        echo $d = $request->input('msg');

        $success = Contactmodel::insert([
            'name' => $a,
            'email' => $c,
            // 'email'=>$c->unique(),
            'message' => $d
        
        ]);
        if ($success) {
            return
            back()->with('success', 'message send Successfully');
        } else {
            echo "error";
        }
    }
    public function order()
    {
        $users = DB::table('order')->get();
        return view('Admin.Admin_order', compact('users'));
    }
}

//very good for all sql queries:
// https://blog.quickadminpanel.com/5-ways-to-use-raw-database-queries-in-laravel/
