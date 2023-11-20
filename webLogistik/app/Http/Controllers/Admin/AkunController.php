<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Akun;
use App\Models\Dompet;

class AkunController extends Controller
{
    public function index()
    {
        $akun = Akun::all();
        return view("admin.akun.index", ['akun' => $akun]);
    }

    public function create()
    {
        $dompet = Dompet::all();
        $jabatan = ['user', 'admin', 'kurir'];
        return view('admin.akun.create', compact('dompet', 'jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname'=> 'required | max:45',
            'username'=> 'required | max:45',
            'email'=> 'required | email | unique:akun',
            'password'=> 'required',
            'level'=> 'required ',
            'alamat'=> 'required | max:45',
            'foto'=> 'nullable | image | mimes:jpg,jpeg,gif,png,svg | max:2048',
            'dompet_id'=> 'nullable | numeric',
        ],
        [
            'fullname.required' => 'Wajib diisi', 
            'username.required' => 'Wajib diisi', 
            'email.required' => 'Wajib diisi', 
            'password.required' => 'Wajib diisi', 
            'level.required' => 'Wajib dipilih', 
            'alamat.required' => 'Wajib diisi', 
            'dompet_id.numeric' => 'Wajib dipilih', 

            'fullname.max' => 'Maksimal 45 Karakter',
            'username.max' => 'Maksimal 45 Karakter',
            'alamat.max' => 'Maksimal 45 Karakter',
            
            'email.unique' => 'Email Sudah Terdaftar',
            'email.email' => 'Format harus "nama@gmail.com"',
            'foto.max' => 'Maksimal 2 MB',
            'foto.image' => 'File ekstensi harus jpg, jpeg, gif, png, svg',
        ]
        );

        $photo = $request->file('foto');
        $extension = $photo->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $path = 'photo-user/'.$fileName;

        Storage::disk('public')->put($path, file_get_contents($photo));
        
        $akun = new Akun;
        $akun->fullname = $request->fullname;
        $akun->username = $request->username;
        $akun->email = $request->email;
        $akun->password = $request->password;
        $akun->level = $request->level;
        $akun->alamat = $request->alamat;
        $akun->foto = $fileName;
        $akun->dompet_id = $request->dompet_id;
        $akun->save();

        return redirect('admin/akun')->with('success','Data Berhasil Ditambahkan!!');

    }

    public function show(string $id)
    {
        $akun = Akun::all()->where('id', $id);
        return view('admin.akun.detail', ['akun'=> $akun]);
    }

    public function edit(string $id)
    {
        $akun = Akun::all()->where('id', $id);
        $dompet = Dompet::all();
        $jabatan = ['user', 'admin', 'kurir'];
        return view('admin.akun.edit', ['akun'=> $akun], compact('jabatan','dompet'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'fullname'=> 'required | max:45',
            'username'=> 'required | max:45',
            'email'=> 'required | email',
            'password'=> 'required',
            'level'=> 'required',
            'alamat'=> 'required | max:45',
            'foto'=> 'nullable | image | mimes:jpg,jpeg,gif,png,svg | max:2048',
            'dompet_id'=> 'nullable | numeric',
        ],
        [
            'fullname.required' => 'Wajib diisi', 
            'username.required' => 'Wajib diisi', 
            'email.required' => 'Wajib diisi', 
            'password.required' => 'Wajib diisi', 
            'level.required' => 'Wajib dipilih', 
            'alamat.required' => 'Wajib diisi', 
            'dompet_id.numeric' => 'Wajib dipilih', 

            'fullname.max' => 'Maksimal 45 Karakter',
            'username.max' => 'Maksimal 45 Karakter',
            'alamat.max' => 'Maksimal 45 Karakter',
            
            'email.email' => 'Format harus "nama@gmail.com"',
            'foto.max' => 'Maksimal 2 MB',
            'foto.image' => 'File ekstensi harus jpg, jpeg, gif, png, svg',
        ]
        );
        
        $akun = Akun::find( $id );

        if ($request->hasFile('foto')) {
            $path = storage_path('app/public/photo-user/'.$akun->foto);
            if (file_exists($path)) {
                Storage::delete($akun->foto);
            }
            $photo = $request->file('foto');
            $extension = $photo->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;

            $photo->move(storage_path('app/public/photo-user'), $fileName);

            $akun->foto = $fileName;
        }

        $akun->fullname = $request->fullname;
        $akun->username = $request->username;
        $akun->email = $request->email;
        $akun->password = $request->password;
        $akun->level = $request->level;
        $akun->alamat = $request->alamat;
        $akun->dompet_id = $request->dompet_id;
        $akun->save();

        return redirect('admin/akun')->with('success','Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        Akun::find($id)->delete();
        return redirect('admin/akun')->with('success','Data Berhasil Dihapus!!');
    }
}
