@extends('admin.template.appadmin')
@section('content')
    @foreach ($paket as $pk)
        <h1>{{$pk->deskripsi}}</h1>
    @endforeach
@endsection