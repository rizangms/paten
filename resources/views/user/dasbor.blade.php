@section('css')
<link rel="stylesheet" href="{{ url('/assets/app/style/dataTables.css') }}" />
<!-- FONTS -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons|Pacifico|Roboto:300,300i,400,400i,500,500i,700,700i|Crimson+Text:400i" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" /> -->
<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" /> -->
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" /> -->
@endsection

@section('js')
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ url('assets/app/js/custom/home.min.js') }}"></script>
@endsection

@extends('layouts.app')

@section('content')
<!-- Page-header start -->
<div class="page-header">
  <div class="page-block">
      <div class="row align-items-center">
          <div class="col-md-8">
              <div class="page-header-title">
                  <h5 class="m-b-10">Dashboard - User</h5>
                  <p class="m-b-0">SIM-PATEN</p>
              </div>
          </div>
          <div class="col-md-4">
              <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                      <a href="#"> <i class="fa fa-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
</div>
<!-- Page-header end -->

<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <!-- task, page, download counter  start -->
                    <div class="col-xl-3 col-md-6">
                        <a href="#" id="button_1">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-purple" id="semuanya">0</h4>
                                            <h6 class="text-muted m-b-0">Semua</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-bar-chart f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-purple">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Permohonan</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-line-chart text-white f-16"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <a href="#" id="button_2">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-green" id="suksesnya">0</h4>
                                            <h6 class="text-muted m-b-0">Selesai</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-check-square-o f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-green">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Permohonan</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-line-chart text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <a href="#" id="button_3">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-yellow" id="pendingnya">0</h4>
                                            <h6 class="text-muted m-b-0">Proses</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-clock-o f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-yellow">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Permohonan</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-line-chart text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <a href="#" id="button_4">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-red" id="tolaknya">0</h4>
                                            <h6 class="text-muted m-b-0">Di Tolak</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-window-close-o f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-red">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Permohonan</p>
                                        </div>
                                        <div class="col-3 text-right">
                                            <i class="fa fa-line-chart text-white f-16"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- task, page, download counter  end -->
                </div>
            </div>
            <!-- Page-body end -->

            <!-- Data start -->
            <div id="TableWhenNeed" class="card">                       
                <div class="card-content no-padding table-responsive">
                    <table id="list-req" class="table display">
                        <thead class="bg-info lighten-5">
                            <tr>
                                <th class="pl-4">No</th>
                                <th class="pl-4">ID Permohonan</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenis</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- Data end -->

        </div>
        <div id="styleSelector"> </div>
    </div>
</div>
@endsection
