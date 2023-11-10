@extends('admin.template.appadmin')
@section('content')
    @foreach ($akun as $user)
        <img src="{{asset('storage/photo-user/'.$user->foto)}}" alt="">
        <h1>{{$user->username}}</h1>
    @endforeach
@endsection