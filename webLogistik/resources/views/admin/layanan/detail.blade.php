@extends('admin.template.appadmin')
@section('content')
    @foreach ($layanan as $lyn)
        <h1>{{$lyn->nama_layanan}}</h1>
    @endforeach
@endsection