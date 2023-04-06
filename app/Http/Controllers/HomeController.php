<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        if ($role == 'user') 
        {
            // return view('home');
            return view('User.user_index');

        }

        if ($role == 'admin') 
        {
            $users = DB::table('users')->count();
            // $users=User::all();
            return view('Admin.admin',compact("users"));
        }
        else
        {
            return view('/');
        }
    }
}
