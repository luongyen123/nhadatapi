<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(){
        return view('contents.login');
        
    }

    public function register(){
                 
        return view('contents.register');
        
    }
}
