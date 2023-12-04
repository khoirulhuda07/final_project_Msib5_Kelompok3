@extends('kurir.template.app')

@section('konten')
<div class="container-fluid mt-5 pt-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center py-4" id="tanggal"></h3>
            <div class="row text-center py-3 mx-2 mb-4 bg-danger text-white rounded">
                <div class="col">
                    <h1 id="font">{{$TLpengiriman}}</h1>
                    <p id="font_p">Total Pesanan</p>
                </div>
                <div class="col">
                    <h1 id="font">{{$BLpengiriman}}</h1>
                    <p id="font_p">Belum Selesai</p>
                </div>
                <div class="col">
                    <h1 id="font">{{$SLpengiriman}}</h1>
                    <p id="font_p">Selesai</p>
                </div>
            </div>
            <div class="row mx-1">
                @foreach ($penerima as $items)
                <div class="col">
                    <p id="font_p">
                         <strong>{{$items->nama}}</strong>
                         <br /> {{$items->tujuan}}
                         <br /> <abbr title="Phone"></abbr> {{$items->nomor}}
                    </p>
                </div>
                <div class="col text-right">
                     <a href="#" class="btn btn-info my-3" type="button">Details</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection