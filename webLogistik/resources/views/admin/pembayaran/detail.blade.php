@extends('admin.template.appadmin')
@section('content')
    @foreach ($pembayaran as $byr)
        <h1>{{$byr->metode}}</h1>
    @endforeach
@endsection