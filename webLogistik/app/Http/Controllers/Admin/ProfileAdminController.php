<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Profiler\Profile;

use App\Models\Users;

class ProfileAdminController extends Controller
{
    public function index()
    {
        // 
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $profile = Users::findOrFail(Auth::id());
        return view('admin.profile.profile', compact('profile'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        request()->validate(
            [
                'fullname' => 'nullable | min:6',
                // 'username' => 'required | string | min:2 | max:100',
                // 'email' => 'required|email|unique:users,email, ' . $id . ',id',
                'old_password' => 'nullable | string',
                'password' => 'nullable | required_with:old_password |string | confirmed | min:8',
                'foto' => 'nullable | image | mimes:jpg,jpeg,gif,png,svg | max:2048',
            ],
            [
                'foto.max' => 'Maksimal 2 MB',
                'foto.image' => 'File ekstensi harus jpg, jpeg, gif, png, svg',
            ]
        );
        $users = Users::find($id);
        $users->fullname = $request->fullName;
        $users->username = $request->username;
        $users->email = $request->email;
        if ($request->filled('old_password')) {
            if (Hash::check($request->old_password, $users->password)) {
                $users->update([
                    'password' => Hash::make($request->password)
                ]);
            } else {
                return back()
                    ->withErrors(['old_password' => __('Tolong Periksa Password')])
                    ->withInput();
            }
        }
        if (request()->hasFile('foto')) {
            $path = public_path('admin/img' . $users->foto);
            if ($request->foto && file_exists($path)) {
                Storage::delete('admin/img' . $users->foto);
            }
            $photo = $request->file('foto');
            $extension = $photo->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;

            $request->foto->move(public_path('admin/img'), $fileName);
            $users->foto = $fileName;
        }
        $users->alamat = $request->alamat;
        $users->save();

        return back()->with('status', 'profile Update!');
    }

    public function destroy(string $id)
    {
        //
    }
}
