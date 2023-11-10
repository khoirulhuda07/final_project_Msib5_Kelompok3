@extends('admin.template.appadmin')
@section('content')
    @foreach ($kurir as $k)
        <h1>{{$pn->nama}}</h1>
    @endforeach
@endsection