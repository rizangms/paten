var $form = $("#req");
$form.submit(function (e) {
    e.preventDefault();
    var nama = $form.find('[name="nama"]').val();
    var nik = $form.find('[name="nik"]').val();
    var alamat = $form.find('[name="alamat"]').val();
    var jenis = $form.find('[name="jenis"]').val();
    
    if ( $.trim(nik).length == 0 ) {
        swal("NIK Kosong", "Kode yang dimasukkan tidak ada!", "error");
        return false;
    } else if ( $.trim(nama).length == 0 ) {
        swal("Nama Kosong", "Kode yang dimasukkan tidak ada!", "error");
        return false;
    } else if ( $.trim(alamat).length == 0 ) {
        swal("Alamat Kosong", "Kode yang dimasukkan tidak ada!", "error");
        return false;
    } else if ( $.trim(jenis).length == 0 ) {
        swal("Jenis Permohonan", "Kode yang dimasukkan tidak ada!", "error");
        return false;
    } else {
        swal({
          title: "Tersimpan!", 
          text: "Form permohonan telah disimpan.", 
          icon: "success",
          confirmButtonText: 'Tutup'
        }).then(function(){
          $form.off("submit").submit(); 
        });
    }
});