@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<style type="text/css">
  fieldset.scheduler-border {
      border: 1px groove #ddd !important;
      padding: 0 1.4em 1.4em 1.4em !important;
      margin: 0 0 1.5em 0 !important;
      -webkit-box-shadow:  0px 0px 0px 0px #000;
              box-shadow:  0px 0px 0px 0px #000;
  }

  legend.scheduler-border {
    font-size: 1em !important;
    font-weight: bold !important;
    text-align: left !important;
    width:auto;
    padding:0 10px;
    border-bottom:none;
  }
</style>
@endsection

@section('js')
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script src="{{ url('/assets/app/js/custom/permintaan.js') }}"></script>
@endsection

@extends('layouts.app')

@php
  $jenis = substr( $id, 0, 1);
  $meta_data = App\Permohonan_meta::get_permintaan( $id );
  $arr_data = unserialize($meta_data->meta_value);
  $file_foto = $arr_data['file_foto'];
@endphp

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
                      <a href="{{ url('/home') }}"> <i class="fa fa-home"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Permintaan</a>
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
                <div class="card o-visible">
                    <div class="card-header">
                        <h5>Data Pemohon</h5>
                    </div>
                    <div class="card-block tooltip-icon button-list">
                      @foreach( $datas as $key => $data )
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">{{ $key }}</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" style=" background-color: white" value="{{ ( $key == 'jenis' ? App\Variable::jenis_surat( $data ) : ( $key == 'status' ? App\Variable::status_proses( $data ) : $data ) ) }}" readonly="">
                            </div>
                        </div>
                      @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-center">
                            <h5>Preview</h5>
                        </div>
                    </div>
                    <div class="card-block">
                      <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                          <embed style="border: 5px solid #525252; box-sizing: border-box;" src="{{ url('/pdf/'.$id.'/show') }}#toolbar=0&navpanes=0&scrollbar=0" width="100%" height="1245">
                            <br>
                            <br>
                          @if( $datas->status != 2 )
                          <form id="proses" method="POST" action="{{ url('/permintaan') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" class="input_tanggalan" name="tanggal_buat_surat">
                            <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                              <div class="btn-group mr-2" role="group" aria-label="First group">
                                <a href="#" id="tombol_tolak" class="btn btn-danger ">Tolak</a>
                              </div>
                              <div class="btn-group mr-2" role="group" aria-label="Second group">
                                <input type="submit" class="btn btn-primary float-right" value="cetak">
                              </div>
                            </div>
<!--                        <a href="#" class="btn btn-danger ">Tolak</a>
                            <input type="submit" class="btn btn-primary float-right" value="cetak"> -->
                          </form>
                          @endif
                          <br>
                          <br>
                          <hr>
                          @if( array_key_exists('file_foto', $arr_data) ) 
                          <div class="row">
                            <div class="col-lg-12 col-xl-12">
                              <div class="sub-title">Kelengkapan File</div>
                                <!-- Nav tabs -->
                                @php( $ii = 1 )
                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                  @foreach( $file_foto as $key => $value ) 
                                    <li class="nav-item">
                                      <a class="nav-link {{ ( $ii == 1 ? 'active' : '' ) }}" data-toggle="tab" href="#{{$key}}" role="tab">{{ strtoupper( str_replace( "foto_", "", $key ) ) }}</a>
                                      <div class="slide"></div>
                                    </li>
                                    @php( $ii++ )
                                  @endforeach
                                </ul>
                                <!-- Tab panes -->
                                @php( $jj = 1 )
                                <div class="tab-content card-block">
                                  @foreach( $file_foto as $key => $value ) 
                                    <div class="tab-pane {{ ( $jj == 1 ? 'active' : '' ) }}" id="{{$key}}" role="tabpanel">
                                      <p class="m-0">
                                        <a class="image-link" href="{{ url('uploads/'.$jenis.'/'.$value) }}">
                                          <img class="rounded mx-auto d-block img-fluid" width="400px" src="{{ url('uploads/'.$jenis.'/'.$value) }}">
                                        </a>
                                      </p>
                                    </div>
                                    @php( $jj++ )
                                  @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                          @endif
                        </div>
                        <div class="col-sm-1"></div>
                      </div>

                      <form id="tolak_permohonan" method="POST" action="{{ url('/tolak') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $id }}">
                      </form>
                </div>
                <!-- Data end -->
            </div>
            <!-- Page-body end -->
        </div>
        <div id="styleSelector"> </div>
    </div>
</div>
@endsection
