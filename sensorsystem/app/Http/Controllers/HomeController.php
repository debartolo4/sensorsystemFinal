<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 1) {
            return view('home');
        } elseif(Auth::user()->type == 2 && Auth::user()->firstLog == 0) {
            return view('corpManager.resetPassword');
        } elseif(Auth::user()->type == 3 && Auth::user()->firstLog == 0) {
            return view('employee.resetPassword');
        } elseif(Auth::user()->type == 2 && Auth::user()->firstLog == 1) {
            return view('corpManager.home');
        } else {
            return view('employee.home');
        }
    }
}
