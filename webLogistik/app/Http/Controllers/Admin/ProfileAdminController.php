<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileAdminController extends Controller
{
    public function index()
    {
        $profile = Users::join('dompet', 'dompet_id', '=', 'dompet.id')
        ->select('users.*', 'dompet.saldo AS saldo')
        ->get();
        return view("admin.profile.index", compact("profile"));
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $profile = Users::join('dompet', 'dompet_id', '=', 'dompet.id')
        ->select('users.*', 'dompet.saldo AS saldo')
        ->where('produk.id', $id)
        ->get();
        return view('admin.profile.index', compact('profile'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
