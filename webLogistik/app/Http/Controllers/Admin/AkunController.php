<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Dompet;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        $akun = DB::table('users')
        ->where('level', '=', 'kurir')
        ->get();
        return view("admin.akun.index", ['akun' => $akun]);
    }

    public function create()
    {
        $dompet = Dompet::all();
        $jabatan = ['kurir'];
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
        ],
        [
            'fullname.required' => 'Wajib diisi', 
            'username.required' => 'Wajib diisi', 
            'email.required' => 'Wajib diisi', 
            'password.required' => 'Wajib diisi', 
            'level.required' => 'Wajib dipilih', 
            'alamat.required' => 'Wajib diisi', 

            'fullname.max' => 'Maksimal 45 Karakter',
            'username.max' => 'Maksimal 45 Karakter',
            'alamat.max' => 'Maksimal 45 Karakter',
            
            'email.unique' => 'Email Sudah Terdaftar',
            'email.email' => 'Format harus "nama@gmail.com"',
        ]
        );

        // $photo = $request->file('foto');
        // $extension = $photo->getClientOriginalExtension();
        // $fileName = time() . '.' . $extension;
        // $path = 'photo-user/'.$fileName;

        // Storage::disk('public')->put($path, file_get_contents($photo));
        
        DB::table('users')->insert([
            'fullname' => $request['fullname'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'level' => $request['level'],
            'alamat' => $request['alamat'],
        ]);
        // $akun = new Users;
        // $akun->fullname = $request->fullname;
        // $akun->username = $request->username;
        // $akun->email = $request->email;
        // $akun->password = Hash::make($request->password);
        // $akun->level = $request->level;
        // $akun->alamat = $request->alamat;
        // $akun->foto = $fileName;
        // $akun->save();

        return redirect('admin/akun')->with('success','Data Berhasil Ditambahkan!!');

    }

    public function show(string $id)
    {
        $akun = Users::all()->where('id', $id);
        return view('admin.akun.detail', ['akun'=> $akun]);
    }

    public function edit(string $id)
    {
        $akun = Users::all()->where('id', $id);
        $dompet = Dompet::all();
        $jabatan = ['kurir'];
        return view('admin.akun.edit', ['akun'=> $akun], compact('jabatan','dompet'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'fullname'=> 'required | max:45',
            'username'=> 'required | max:45',
            'email'=> 'required | email',
            'level'=> 'required',
            'alamat'=> 'required | max:45',
        ],
        [
            'fullname.required' => 'Wajib diisi', 
            'username.required' => 'Wajib diisi', 
            'email.required' => 'Wajib diisi', 
            'level.required' => 'Wajib dipilih', 
            'alamat.required' => 'Wajib diisi',  

            'fullname.max' => 'Maksimal 45 Karakter',
            'username.max' => 'Maksimal 45 Karakter',
            'alamat.max' => 'Maksimal 45 Karakter',
            
            'email.email' => 'Format harus "nama@gmail.com"',
        ]
        );
        
        $akun = Users::find( $id );

        // if (request()->hasFile('foto')) {
        //     $path = storage_path('app/public/photo-user/'.$akun->foto);
        //     $photo = $request->file('foto');
        //     if ($request->foto && file_exists($path)) {
        //         Storage::delete('app/public/photo-user/'.$akun->foto);
        //     }
        //     $extension = $photo->getClientOriginalExtension();
        //     $fileName = time() . '.' . $extension;

        //     $request->foto->move(storage_path('app/public/photo-user'), $fileName);

        //     $akun->foto = $fileName;
        // }

        $akun->fullname = $request->fullname;
        $akun->username = $request->username;
        $akun->email = $request->email;
        $akun->level = $request->level;
        $akun->alamat = $request->alamat;
        $akun->save();

        return redirect('admin/akun')->with('success','Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        Users::find($id)->delete();
        return redirect('admin/akun')->with('success','Data Berhasil Dihapus!!');
    }
}
