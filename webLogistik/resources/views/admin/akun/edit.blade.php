@extends('admin.template.appadmin')

<!-- form start -->
@section('content')
@foreach ($akun as $user)
    
    <form action="{{route('akun.update',$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="container-fluid pt-4 px-4">
            <h6 class="mb-4">Tambah Data Akun</h6>
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <!-- input pertama -->
                    <div class="form-floating mb-3">
                    <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="floatingKode" placeholder="Masukkan nama lengkap" value="{{$user->fullname}}">
                    <label for="floatingKode">Nama Lengkap</label>
                    @error('fullname')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
            
                    <!-- input kedua -->
                    <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingKategori" placeholder="Masukkan Username" value="{{$user->username}}">
                    <label for="floatingKategori">Username</label>
                    @error('username')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
            
                    <!-- input ke tiga -->
                    <div class="form-floating mb-3">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingDeskripsi" placeholder="Masukkan Email" value="{{$user->email}}">
                    <label for="floatingDeskripsi">Email</label>
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
        
                    <!-- input ke empat -->
                    <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPass" placeholder="Masukkan Password" value="{{$user->password}}">
                    <label for="floatingPass">Password</label>
                    @error('password')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
                    
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <!-- input ke lima -->
                    <label>Jabatan</label>
                    <div class="form-floating mb-3">
                        @foreach ($jabatan as $jb)
                        @php $sel = ($jb == $user->level) ? 'checked' : ''; @endphp
                        <div class="form-check form-check-inline @error('level') is-invalid @enderror">
                            <input class="form-check-input" type="radio" name="level" id="floatingLevel_{{$loop->iteration}}" value="{{$jb}}" {{$sel}}>
                            <label class="form-check-label" for="floatingLevel">{{$jb}}</label>
                        </div>
                        @endforeach
                        @error('level')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                
                    <!-- input ke enam -->
                    <div class="form-floating mb-3">
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="floatingAlamat" placeholder="Masukkan Alamat" value="{{$user->alamat}}">
                        <label for="floatingAlamat">Alamat</label>
                        @error('alamat')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <!-- input ke tujuh -->
                    <div class="form-floating mb-3">
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="floatingfoto" placeholder="Masukkan foto">
                        <label for="floatingfoto">Foto Profile</label>
                        @error('foto')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                
                    <!-- input ke delapan -->
                    <div class="form-floating mb-3">
                        <select class="form-select @error('dompet_id') is-invalid @enderror" name="dompet_id"id="saldo" aria-label="Floating label select example">
                            <option selected>--- Saldo Dompet ---</option>
                            @foreach ($dompet as $dom)
                            @php $sel = ($dom->id == $user->dompet_id) ? 'selected' : ''; @endphp
                                <option value="{{$dom->id}}" {{$sel}}>{{$dom->saldo}}</option>
                            @endforeach
                        </select>
                        @error('dompet_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <label for="saldo">Saldo</label>
                    </div> 
                    <br>
                        <button name="proses" value="save" type="submit" class="btn btn-warning">Update</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    <!-- form end -->
@endforeach
@endsection