@extends('admin.template.appadmin')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa-solid fa-truck-arrow-right fa-2xl" style="color: #387fc2; margin-left: 80px;"></i>
                <div class="ms-3">
                    <p class="mb-2">Pengiriman</p>
                    <h5 class="mb-0">{{$pengiriman}}</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa-brands fa-cc-amex fa-2xl" style="color: #387fc2; margin-left: 80px;"></i>
                <div class="ms-3">
                    <p class="mb-2">Layanan</p>
                    <h5 class="mb-0">{{$layanan}}</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa-solid fa-people-carry-box fa-2xl" style="color: #387fc2; margin-left: 80px;"></i>
                <div class="ms-3">
                    <p class="mb-2">Kurir</p>
                    <h5 class="mb-0">{{$kurir}}</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa-solid fa-money-check-dollar fa-2xl" style="color: #387fc2; margin-left: 80px;"></i>
                <div class="ms-3">
                    <p class="mb-2">Dompet</p>
                    <h5 class="mb-0">Rp.{{$saldo}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->


<!-- Sales Chart Start -->
<!-- <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Worldwide Sales</h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="worldwide-sales"></canvas>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0"></h6>
                    <a href="">Show All</a>
                </div>
                <canvas id="salse-revenue"></canvas>
            </div>
        </div>
    </div>
</div> -->
<!-- Sales Chart End -->

<div class="row">
    <div class="col-xl-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Jumlah Kurir</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPie"></canvas>
                </div>
                <hr>
                Berikut ini adalah jumlah kurir yang dipilih dengan total {{$pengiriman}} pengiriman paket
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Jumlah Layanan</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <hr>
                Berikut ini adalah jumlah layanan yang dipilih penerima dengan total {{$pengiriman}} pengiriman paket
            </div>
        </div>
    </div>
</div>

<script>
    // Kode JavaScript untuk grafik pertama (myPie)

    var labels = [@foreach($jkurir as $jk) '{{$jk->nama_kurir}}', @endforeach];
    var data2 = [@foreach($jkurir as $jk) {{$jk->jumlah}}, @endforeach];

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#myPie'), {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data2,
                    backgroundColor: ['#008B8B', '#2E8B57', '#3c9faf'],
                    hoverBackgroundColor: ['#008080', '#3CB371', '#3c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    });

    // Kode JavaScript untuk grafik kedua (myPieChart)

    var label2 = [@foreach($jlayanan as $jly) '{{$jly->nama_layanan}}', @endforeach];
    var data3 = [@foreach($jlayanan as $jly) {{$jly->jumlah}}, @endforeach];

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#myPieChart'), {
            type: 'doughnut',
            data: {
                labels: label2,
                datasets: [{
                    data: data3,
                    backgroundColor: ['#164863', '#427D9D', '#9BBEC8'],
                    hoverBackgroundColor: ['#123456', '#5F9EA0', '#98AFC7'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    });
</script>



<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Detail Paket</h6>
            <a href="{{url('admin/paket')}}">Show All</a>
        </div>
        <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">No</th>
                                <th class="text-bold" scope="col">Berat</th>
                                <th class="text-bold" scope="col">Deskripsi</th>
                                <th class="text-bold" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paket as $pk)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$pk->berat}} Kg</td>
                                <td>{{$pk->deskripsi}}</td>
                                <td>
                            
                                    <a href="{{route('paket.show',$pk->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{route('paket.edit',$pk->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$pk->id}}">
                                        <i class="fas fa-trash"></i>
                                        </button>     
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$pk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Apakah anda yakin akan menghapus data {{$pk->deskripsi}} ?
                                          </div>
                                          <div class="modal-footer">
                                            <form action="{{route('paket.destroy',$pk->id)}}" method="POST">
                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
</div>
<!-- Recent Sales End -->


<!-- Widgets Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <!-- <div class="col-sm-12 col-md-6 col-xl-4"> -->
            <div class="h-100 bg-light rounded p-4">
                <!-- <div class="d-flex align-items-center justify-content-between mb-2">
                    <h6 class="mb-0">Messages</h6>
                    <a href="">Show All</a>
                </div> -->
                <!-- <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-3">
                    <img class="rounded-circle flex-shrink-0" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 justify-content-between">
                            <h6 class="mb-0">Jhon Doe</h6>
                            <small>15 minutes ago</small>
                        </div>
                        <span>Short message goes here...</span>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                
                    <h6 class ="mb-0">Calender</h6>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <!-- <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">To Do List</h6>
                    <a href="">Show All</a>
                </div>
                <div class="d-flex mb-2">
                    <input class="form-control bg-transparent" type="text" placeholder="Enter task">
                    <button type="button" class="btn btn-primary ms-2">Add</button>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Short task goes here...</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Short task goes here...</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox" checked>
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span><del>Short task goes here...</del></span>
                            <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Short task goes here...</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center pt-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Short task goes here...</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection