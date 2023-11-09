@extends('admin.template.appadmin')
@section('content')
    @foreach ($pengiriman as $pn)
        <h1>{{$pn->kode}}</h1>
    @endforeach
@endsection