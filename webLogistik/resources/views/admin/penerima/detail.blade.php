@extends('admin.template.appadmin')
@section('content')
    @foreach ($penerima as $pn)
        <h1>{{$pn->nama}}</h1>
    @endforeach
@endsection