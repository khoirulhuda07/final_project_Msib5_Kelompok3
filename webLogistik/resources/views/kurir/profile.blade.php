@extends('kurir.template.app')

@section('konten')
<div class="container-fluid mt-5 pt-5">
    <div class="row">
        <div class="col-md-12 my-2">
            <div class="col text-center">
                <div class="col">
                    @if (empty(Auth::user()->foto))
                    <img src="{{asset('admin/photo_user/no_photo.jpg')}}" alt="Profile" class="rounded-circle">
                    @else
                    <img src="{{asset('storage/photo_user/'.Auth::user()->foto)}}" alt="Profile" class="rounded-circle">
                    @endif
                </div>
                <div class="col mt-4">
                    <div class="col">{{$kurir->nama_kurir}}</div>
                    <div class="col">{{$kurir->jadwal}}</div>
                </div>
            </div>
        </div>
        <a class="btn btn-light border btn-block mx-4 my-4" href="{{ route('logout') }}"
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