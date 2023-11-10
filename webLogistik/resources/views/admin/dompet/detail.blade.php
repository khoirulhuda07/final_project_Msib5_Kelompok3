@extends('admin.template.appadmin')
@section('content')
    @foreach ($dompet as $d)
        <h1>{{$d->saldo}}</h1>
    @endforeach
@endsection