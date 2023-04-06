<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Headcontroller extends Controller
{
    public function index()
    {
        return view('Layout.index');
    } 
    public function About()
    {
        return view('about_us');
    }
    public function Privacy()
    {
        return view('privacy_policy');
    }
    public function Contact()
    {
        return view('contact_us');
    }
    // public function Sign_up()
    // {
    //     return view('auth.register');
    // }
    // public function Login()
    // {
    //     return view('auth.login');
    // }
    
}
