<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use App\Models\Party_model;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $users)
    {
        $role = Auth::user()->role;

        if ($role == 'user') {
            // return view('home');
            // return view('User.user_index');
            // $id = auth()->user()->id;
            // //  return $role = DB::table('party')->where('id','=', $id)->count();
            //  $role = DB::table('party')->where('id', '=', $id)->count();

            // // return $role1 = DB::table('party')->where('id', '=', $id, 'and', 'status', '=', 'Approve')->count();
            //  $role1 = DB::table('party')
            //     ->where('id', $id)
            //     ->where('status', 'Not Approved')
            //     ->count();

            // $role2 = DB::table('party')
            // ->where('id', $id)
            // ->where('status', 'Approve')
            // ->count();
            // // dd($role1);
            // if ($role == 0) {
            //     return Redirect::to('user_party');
            // } if ($role1 == 1) {
            //     return Redirect::to('user_after_party_wait');
            // } 
            // if ($role2 == 1) {
            //     return Redirect::to('user_party_done');
            // }
            // // elseif (($role1 = DB::table('party')->where('id', '=', $id, 'and', 'status', '==', 'Approve')->count() == 1)) 
            // // {
            // // }
            // else {
            //     return Redirect::to('user_after_party_wait');

            //     // return back()->
            //     // with('error', 'something went wrong');
            // }

            $id = auth()->user()->id;

            $role = DB::table('party')->where('id', '=', $id)->count();

            $role1 = DB::table('party')
                ->where('id', $id)
                ->where('status', 'Not Approved')
                ->count();

            $role2 = DB::table('party')
            ->where('id', $id)
                ->where('status', 'Approve')
                ->count();

            if ($role == 0) {
                return redirect()->to('user_party');
            } elseif ($role1 == 1) {
                return redirect()->to('user_after_party_wait');
            } elseif ($role2 == 1) {
                return redirect()->to('user_party_done');
            } else {
                return redirect()->to('user_after_party_wait');
            }
        }

        if ($role == 'admin') {
            $users = DB::table('users')->where('role', '=', 'user', 'and', 'status', '=', 'Active')->get()->count();
            $orders = DB::table('order')->count();
            $orders_pending = DB::table('order')->where('status', '=', 'Pending')->get()->count();
            $orders_complete = DB::table('order')->where('status', '=', 'Done')->get()->count();
            $pay = DB::table('payment')->get()->count();

            return view('Admin.admin', compact('users', 'orders', 'orders_pending', 'orders_complete', 'pay'));
        } else {
            return view('/');
        }
    }
}
