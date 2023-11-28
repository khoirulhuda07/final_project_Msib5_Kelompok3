<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
            return redirect('')->withErrors('username atau password salah')->withInput();
        };
    }
}
