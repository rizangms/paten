@section('css')

@if( isset( $aksi ) && $aksi == 'lihat' )
<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet">
@else
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endif

@endsection

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script type="text/javascript">
  "use strict";
  $(document).ready(function(){
      $('.dropify').dropify();
   });

  var $form = $("#save-post");
  $form.submit(function (e) {
    e.preventDefault();
    swal({
      title: "Sukses!", 
      text: "Post baru berhasil disimpan", 
      type: "success",
      confirmButtonText: 'Tutup'
    })
    .then(function(){
      $form.off("submit").submit(); 
    });
  });
</script>

@if( isset( $aksi ) && $aksi == 'lihat' )
<script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js" type="text/javascript">
  </script> 
<script type="text/javascript">
  $(function(){
    $('input').attr('readonly', true);
    $('.popup-link').magnificPopup({type:'image'});
  });
</script>
@elseif( isset( $aksi ) && $aksi == 'edit' )
<script type="text/javascript">
  "use strict";
  $(document).ready(function(){
      $('.dropify').dropify();
      $('#hapus-post').click(function() {
        Swal({
          title: 'Anda yakin menghapus post ini?',
          text: "Post ini akan hilang secara permanen jika anda menghapus!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.value) {
            Swal(
              'Berhasil di hapus!',
              "Post judul '{{ $datas->judul }}' berhasil di hapus.",
              'success'
            ).then(function(){
                location.href="{{ url('/posts/hapus/'.$datas->id) }}";
            });
          }
        })
      });
  });
</script>
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
                  <li class="breadcrumb-item"><a href="#">Post</a>
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
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                          <div class="card-header">
                              <div class="row">
                                <div class="col-6 align-self-center">
                                  <h5>Post</h5>
                                </div>
                                <div class="col-6 align-self-center">
                                  @if( isset( $aksi ) && $aksi == 'lihat' )
                                    <a href="{{ url('/posts/edit/'.$datas->id) }}" class="btn btn-sm btn-primary float-right">Edit</a>
                                  @elseif( isset( $aksi ) && $aksi == 'edit' )
                                    <a href="#" id="hapus-post" class="btn btn-sm btn-danger float-right">Hapus</a>
                                  @endif
                                </div>
                              </div>
                          </div>
                          <div class="card-block">
                              <form id="save-post" method="POST" enctype="multipart/form-data" action="{{ url('/posts') }}" >
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ ( isset( $datas ) ? $datas->id : '' ) }}">
                                <input type="hidden" name="tipe" value="{{ ( isset( $datas ) ? 'edit' : 'tambah' ) }}">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="judul" class="form-control" value="{{ ( isset( $datas ) ? $datas->judul : '' ) }}">
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Subjudul</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="subjudul" class="form-control" value="{{ ( isset( $datas ) ? $datas->subjudul : 'Mekanisme pengurusan berkas' ) }}">
                                    </div>
                                </div> 

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                      @if( isset( $aksi ) && $aksi == 'lihat' )
                                      <a class="popup-link" href="{{ url('uploads/posts/'.$datas->foto) }}">
                                        <img class="img-thumbnail img-fluid" src="{{ url('uploads/posts/'.$datas->foto) }}">
                                      </a>
                                      @else
                                        <input type="file" name="foto_post" class="dropify" data-show-remove="false" data-allowed-file-extensions="jpg jpeg" data-default-file="{{ ( isset( $datas ) ? url('uploads/posts/'.$datas->foto) : '' ) }}"/>
                                        <input type="hidden" name="foto_post_control" value="{{ ( isset( $datas ) ? $datas->foto : '' ) }}" />
                                      @endif
                                    </div>
                                </div> 

                                @if( isset( $aksi ) && $aksi == 'lihat' )

                                @else
                                <div class="form-group row">
                                  <div class="col-sm-12 text-right">
                                    <button type="submit" id="posting" class="btn btn-primary">Simpan</button>
                                  </div>
                                </div>
                                @endif

                              </form>
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