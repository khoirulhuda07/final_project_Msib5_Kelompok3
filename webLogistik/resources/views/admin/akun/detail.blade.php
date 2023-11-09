@extends('admin.template.appadmin')
@section('content')
    @foreach ($akun as $user)
        <h1>{{$user->username}}</h1>
    @endforeach
@endsection