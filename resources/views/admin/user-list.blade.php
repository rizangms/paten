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
<script src="{{ url('/assets/app/js/custom/listuser.min.js') }}"></script>

@if ( $id )
<script src="{{ url('/assets/app/js/custom/listuser-validate-edit.min.js') }}"></script>
@else
<script src="{{ url('/assets/app/js/custom/listuser-validate-add.min.js') }}"></script>
@endif
@endsection

@extends('layouts.app')

@section('content')
<!-- Page-header start -->
<div class="page-header">
  <div class="page-block">
      <div class="row align-items-center">
          <div class="col-md-8">
              <div class="page-header-title">
                  <h5 class="m-b-10">Dashboard</h5>
                  <p class="m-b-0">SIM-PATEN</p>
              </div>
          </div>
          <div class="col-md-4">
              <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                      <a href="{{ url( '/home' ) }}"> <i class="fa fa-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Pengguna</a>
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
                <!-- Data start -->
                <div class="container">
                	<div class="row">
                		<div class="col col-sm-12 col-md-6 col-lg-4">
                            <h3>{{ ( $id ? 'Edit' : 'Tambah' ) }} Pengguna</h3>  
							                 <div class="card">
                                <div class="card-block">
                                    <form id="user_form" class="form-material" role="form" method="POST" action="{{ url('/users/form') }}">
                                    	{{ csrf_field() }}
                                    	<input type="hidden" name="id" value="{{ $id }}">
                                        <div class="form-group form-primary">
                                            <input type="text" name="username" class="form-control" value="{{ ( $id ? $datas[0]->username : '' ) }}" {{ ( $id ? '' : 'required' ) }}>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Username</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <input type="text" name="nama" class="form-control" value="{{ ( $id ? $datas[0]->name : '' ) }}" {{ ( $id ? '' : 'required' ) }}>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Nama</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <input type="email" name="email" class="form-control" value="{{ ( $id ? $datas[0]->email : '' ) }}" {{ ( $id ? '' : 'required' ) }}>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Email</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <input type="password" name="new_password" class="form-control" {{ ( $id ? '' : 'required' ) }}>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Password</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <input type="password" name="new_password_confirm" class="form-control" {{ ( $id ? '' : 'required' ) }}>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Ulangi Password</label>
                                        </div>
                                        @if ( $id )
                                        <button type="button" class="btn btn-inverse waves-effect waves-light float-left" onclick="window.location='{{ url()->previous() }}';">Batal</button>
                                        @endif
                                        <button type="submit" class="btn btn-success waves-effect waves-light float-right">{{ ( $id ? 'Simpan' : 'Tambah' ) }}</button>
                                    </form>
                                </div>
                            </div>
                		</div>
                		<div class="col col-sm-12 col-md-6 col-lg-8">
                			<h3>Daftar Pengguna</h3>        
			                <div id="TableUser" class="card">         
			                    <div class="card-content no-padding table-responsive">
			                        <table id="list-user" class="table display">
			                            <thead class="bg-info lighten-5">
			                                <tr>
			                                    <th class="pl-4">Username</th>
			                                    <th>Nama</th>
			                                    <th colspan="2" class="align-middle">E-Mail</th>
			                                </tr>
			                            </thead>
			                        </table>
			                    </div>
			                </div>
                		</div>
                	</div>
                </div>
                <!-- Data end -->
            </div>
            <!-- Page-body end -->
        </div>
        <div id="styleSelector"> </div>
    </div>
</div>

@endsection