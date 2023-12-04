@extends('kurir.template.app')

@section('konten')
<div class="container-fluid mt-5 pt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="col text-center">
                <div class="col">
                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                </div>
                <div class="col">
                    <div class="col">{{$kurir->nama_kurir}}</div>
                    <div class="col">{{$kurir->jadwal}}</div>
                </div>
            </div>
        </div>
        <a class="btn btn-light border btn-block mx-4" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span>Log Out</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
@endsection