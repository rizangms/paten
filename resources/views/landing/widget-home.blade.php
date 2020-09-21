					<div class="form-access">
						<div class="row">
							<div class="col-12 col-md-6">
								<div class="access" id="layman-form">
									<div class="access-head text-center">
										<h4 class="text-uppercase">Layanan Mandiri</h4>
										<p>Masukkan Kode Permohonan Anda</p>
									</div>
									<div class="access-body">
										<form id="cek_form" method="GET" action="{{ url('/ajukan-permohonan') }}">
											<div class="form-group">
												<label class="sr-only" for="kode-field">KODE</label> 
												<input class="form-control" id="kode-field" name="kode" placeholder="KODE" type="text">
												<input type="hidden" name="cek" value="cek" >
											</div>
											<button class="btn btn-info btn-block" id="tombol_cek" type="submit">Cek Status <i aria-hidden="true" class="fa fa-angle-double-right"></i></button>
										</form>
										<hr style="display: block;height: 1px;border: 0;border-top: 1px solid #ccc;margin: 0.5em 0;padding: 0; ">
											<a href="{{ url( '/ajukan-permohonan' ) }}" class="btn btn-info btn-block">Ajukan Permohonan <i aria-hidden="true" class="fa fa-angle-double-right"></i></a>
										<p class="notes">Ajukan Permohonan untuk mengajukan surat permohonan secara online.</p>
									</div>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<div class="access" id="admin-form">
									<div class="access-head text-center">
										<h4 class="text-uppercase">Administrator</h4>
										<p>Masukan username dan password</p>
									</div>
									<div class="access-body">
										<form id="admin_form" action="{{ route('login') }}" method="post">
											{{ csrf_field() }}
											<div class="form-group">
												<label class="sr-only" for="username-field">Username</label> <input class="form-control" id="username-field" name="username" placeholder="Username" type="text">
											</div>
											<div class="form-group">
												<label class="sr-only" for="password-field">Password</label> <input class="form-control" id="password-field" name="password" placeholder="Password" type="password">
											</div>
											<button class="btn btn-info btn-block" id="admin_masuk" type="submit">Masuk <i aria-hidden="true" class="fa fa-angle-double-right"></i></button>
										</form>
										<p class="notes">Formulir akses hanya untuk operator kecamatan, tidak untuk publik.</p>
									</div>
								</div>
							</div>
						</div>
					</div>