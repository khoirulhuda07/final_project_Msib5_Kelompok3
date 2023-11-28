<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = Users::join('dompet', 'dompet_id', '=', 'dompet.id')
        ->select('users.*', 'dompet.saldo AS saldo')
        ->get();
        return view("admin.profile.index", compact("profile"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Users::join('dompet', 'dompet_id', '=', 'dompet.id')
        ->select('users.*', 'dompet.saldo AS saldo')
        ->where('produk.id', $id)
        ->get();
        return view('admin.profile.index', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
