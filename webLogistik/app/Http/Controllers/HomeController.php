<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->level == 'admin') {
            return redirect('admin/dashboard');
        } elseif (auth()->user()->level == 'user') {
            // Logika untuk user
            return redirect('user/home');
        } else {
            return redirect('/');
        }
        // return redirect('user/home');
    }
}
