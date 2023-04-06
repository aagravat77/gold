<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function change_password()
    {
        return view('User.change_password');
    }
    public function user_profile()
    {
        return view('User.user_profile');
    }
    public function user_profile_post(Request $request)
    {
        // echo $request;
        $request->validate(
            [
                'name' => 'required|max:20|min:2',
                'number' => 'required|max:10|min:10',

            ]
        );
        echo $id = $request->input('email');
        echo $a = $request->input('name');
        echo $b = $request->input('number');
       $user = DB::table('users')->where('id', '=', $id)->first();
        if ($user) {
            DB::table('users')->where('id','=',$id)->update(['name' => $a,'number'=>$b]);
        }
        return back()->with('success', 'Profile Updated Successfully');
        // echo "updated";
        // return redirect()->route('/');
        // return view('User.user_profile');
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
            'password' => Hash::make($request->con)
            // 'password' => $request->con

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
    public function order(Request $request)
    {
        echo $a = $request->input('name');
        echo $b = $request->input('price');
        echo $c = $request->input('qn');
        echo $d = $request->input('pn');
        echo $e = $request->input('Address');

        $success = order::insert([
            'item name' => $a,
            'item price' => $b,
            'item quantity' => $c,
            'party name' => $d,

            'address' => $e,
            // 'email'=>$c->unique(),

        ]);
        if ($success) {
            return
                back()->with('success', 'Order taken Successfully');
        } else {
            echo "error";
        }


    }
}
