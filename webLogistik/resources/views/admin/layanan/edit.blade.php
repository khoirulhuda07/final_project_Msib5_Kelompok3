@extends('admin.template.appadmin')

@section('content')
    @foreach ($layanan as $lyn)
        <form action="{{ route('layanan.update', $lyn->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="container-fluid pt-4 px-4">
                <h6 class="mb-4">Ubah Data Layanan</h6>
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="form-floating mb-3">
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    id="floatingKode" placeholder="Masukkan Nama Layanan" value="{{ $lyn->nama_layanan }}">
                                <label for="floatingKode">Nama Layanan</label>
                                @error('nama')
                                    <div classs="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="biaya"
                                    class="form-control @error('biaya') is-invalid @enderror" id="floatingKategori"
                                    placeholder="Masukkan Biaya Layanan" value="{{ $lyn->biaya }}">
                                <label for="floatingKategori">Biaya</label>
                                @error('biaya')
                                    <div classs="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                              </div>
                              <!-- input ke lima -->
                              <div class="form-floating mb-3">
                                  <select class="form-select @error('kurir_id') is-invalid @enderror" name="kurir_id"
                                      id="nama_kurir" aria-label="Floating label select example">
                                      <option selected>--- nama kurir ---</option>
                                      @foreach ($kurir as $items)
                                          @php $sel = ($items->id == $lyn->kurir_id) ? 'selected' : ''; @endphp
                                          <option value="{{ $items->id }}" {{ $sel }}>{{ $items->nama_kurir }}
                                          </option>
                                      @endforeach
                                  </select>
                                  @error('kurir_id')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                  <label for="nama_kurir">nama kurir</label>
                              </div>
                              <br>
                              <button name="proses" value="save" type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </div>
    @endforeach
@endsection
