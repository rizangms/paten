$(document).ready(function() {
	$('.image-link').magnificPopup({type:'image'});
});


var date = new Date();
var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
$('.input_tanggalan').datepicker({
	format: "dd MM yyyy",
	language: "id",
	todayHighlight: true,
	startDate: today,
	endDate: end,
	autoclose: true
});
$('.input_tanggalan').datepicker('setDate', today);


$(".form-control").prop("readonly",true);
var $form = $("#proses");
$form.submit(function (e) {
	e.preventDefault();
	swal({
	  title: "Masukkan untuk Nomor Surat:",
	  input: 'text',
	})
	.then((result) => {
	  if (result.value) {
	    var nomor_surat = $("<input>")
	             .attr("type", "hidden")
	             .attr("name", "nomor_surat").val( result.value );
	    $form.append(nomor_surat);
	    swal({
	      title: "Sukses!", 
	      text: "Semua data telah diterima dan akan di cetak.", 
	      type: "success",
	      confirmButtonText: 'Tutup'
	    })
	    .then(function(){
	      $form.off("submit").submit(); 
	    });
	  }
	})
});


$('#tombol_tolak').click(function(){
	var $form = $("#tolak_permohonan");

	Swal({
	  title: 'Anda yakin untuk menolak?',
	  text: "Jika menolak berikan alasannya!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya, Tolak!',
	  cancelButtonText: 'Batal',
	}).then((result) => {
		if (result.value) {
			swal({
			  	title: 'Berikan Alasan!',
			  	html:
					'<textarea id="swal-input1" class="swal2-textarea"></textarea>',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Simpan!',
				cancelButtonText: 'Batal',
				preConfirm: function () {
					return new Promise(function (resolve, reject) {
						if ($('#swal-input1').val() != '' ) {
							resolve([
								$('#swal-input1').val(),
							])
						} else {
							reject('Berikan alasannya jangan di PHP !');
						}
					})
				},
				onOpen: function () {
					$('#swal-input1').focus()
				}
			}).then(function (result) {
				if (result.value) {
					var ta = $('#swal-input1').val();

					var alasan = $("<textarea>")
						.attr("name", "alasan").val( ta );
					$form.append(alasan);
					
					swal({
						title: "Sukses!", 
						text: "Permohonan telah di tolak.", 
						type: "success",
						confirmButtonText: 'Tutup'
					})
					.then(function(){
						$form.submit(); 
					});
				} else if ( result.dismiss === Swal.DismissReason.cancel ) {
					swalWithBootstrapButtons(
					  'Cancelled',
					  'Your imaginary file is safe :)',
					  'error'
					)
				}
			}).catch(swal.noop)
		} else if ( result.dismiss === Swal.DismissReason.cancel ) {
			swalWithBootstrapButtons(
			  'Cancelled',
			  'Your imaginary file is safe :)',
			  'error'
			)
		}
	})
});