@section('css')
<style type="text/css">
  .bs-callout {
    padding: 17px;
    margin: 17px 0;
    border: 1px solid #1b809e;
    border-left-width: 5px;
    border-radius: 3px;
  }
  .bs-callout-info {
    border-left-color: #1b809e;
  }
  .bs-callout-info h5 {
    color: #1b809e;
  }
  .bs-callout h5 {
    margin-top: 0;
    margin-bottom: 5px;
  }
  .h5 {
    font-size: 18px;
  }
  .bs-callout p:last-child {
    margin-bottom: 0;
  }
</style>
@endsection

@section('js')
<script type="text/javascript">
  $(function(){
    $('ul.pagination').addClass('justify-content-center my-3');
    $('ul.pagination').find('li').addClass('page-item');
    $('li.page-item').find('a, span').addClass('page-link rounded');
  });
</script>

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
                                <div class="col align-self-center">
                                  <h5>List Post</h5>
                                </div>
                                <div class="col align-self-center">
                                    <a href="{{ url('/posts/insert') }}" class="btn btn-sm btn-primary float-right">Tambah</a>
                                </div>
                              </div>
                          </div>
                          <div class="card-block">
                              @if( isset( $datas ) )
                                @foreach( $datas as $key => $value )
                                <div class="bs-callout bs-callout-info row" id="callout-navs-tabs-plugin"> 
                                    <div class="col-sm-8">
                                        <a href="{{ url('/posts/lihat/'.$value->id) }}"><h5 class="h5">{{ $value->judul }}</h5></a> 
                                        <p>{{ $value->subjudul }}</p> 
                                    </div>
                                    <div class="col-sm-4 align-self-center ">
                                        <div class="btn-group float-right" role="group">
                                          <a href="{{ url('/posts/lihat/'.$value->id) }}">
                                            <button type="button" class="btn btn-sm btn-outline-info ">Lihat</button>
                                          </a>
                                          <a href="{{ url('/posts/edit/'.$value->id) }}">
                                            <button type="button" class="btn btn-sm btn-outline-info">Edit</button>
                                          </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                              @else
                              <div class="m-5">
                                <p class="text-center"><i>Tidak ada post</i></p>
                              </div>
                              @endif
                          </div>
                          <nav aria-label="Page navigation">
                            {{ $datas->links() }}
                          </nav>
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