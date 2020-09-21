@section('css')
<style type="text/css">
	.foto-post {
	  object-fit: cover;
	  object-position: 100% 0;

	  width: 350px;
	  height: 200px;
	}
</style>
@endsection

@extends('layouts.landing')

@section('content')		
		<div class="site-content" id="content">
			<main class="site-main" id="main" role="main">
				<header class="page-header">
					<div class="container">
						<h4 class="title">Mekanisme Pengurusan Berkas</h4>
						<p class="desc">Tahapan dalam pengurusan sebuah berkas di kantor desa</p>
					</div>
				</header>
				<div class="container">
					<div class="row">
						@if( $posts != '' )
						@foreach( $posts as $post )
						<div class="col-12 col-md-6 col-lg-4">
							<article class="hentry">
								<a href="{{ url('/artikel/'.$post->id) }}"><img alt="" class="rounded img-fluid mx-auto d-block foto-post" src="{{ url('uploads/posts/'.$post->foto) }}"></a>
								<h2 class="entry-title text-center"><a href="{{ url('/artikel/'.$post->id) }}" rel="bookmark">{{ $post->judul }}</a></h2>
							</article>
						</div>
						@endforeach
						@endif
					</div>
				</div>
			</main><!-- .site-main -->
		</div><!-- .site-content -->
		
@endsection