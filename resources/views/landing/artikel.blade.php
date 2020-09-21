@section('js')

@endsection

@section('css')

@endsection

@extends('layouts.landing')

@section('content')
		<div class="site-content" id="content">
			<main class="site-main" id="main" role="main">
				<header class="page-header">
					<div class="container">
						<h1 class="title h4">{{ $post->judul }}</h1>
						<p class="desc">{{ $post->subjudul }}</p>
					</div>
				</header>
				<div class="container">
					<div class="row" style="margin-top: -4px !important;">
						<div class="col-12 col-lg-8">
							<p class="text-center"><a class="popup-link" href="{{ url('uploads/posts/'.$post->foto) }}"><img class="img-thumbnail img-fluid" src="{{ url('uploads/posts/'.$post->foto) }}"></a></p>
						</div>
					</div>
				</div>
			</main><!-- .site-main -->
		</div><!-- .site-content -->
@endsection