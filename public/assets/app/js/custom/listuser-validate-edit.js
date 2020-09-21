    $(document).ready(function(){
        $('input[type="submit"],input[name="new_password"],input[name="new_password_confirm"]').on("click change", function(e){
            e.preventDefault();
            if ( ($('input[name="new_password"]').val() != '' && $('input[name="new_password_confirm"]').val() == '') || ($('input[name="new_password"]').val() == '' && $('input[name="new_password_confirm"]').val() != '') ) {
                $('input[name="new_password"]').attr('required', true);
                $('input[name="new_password_confirm"]').attr('required', true);
            } else {
                $('input[name="new_password"]').attr('required', false);
                $('input[name="new_password_confirm"]').attr('required', false);
            }
            return false;
        });
    });
    var $form = $("#user_form");
    $form.submit(function (e) {
        e.preventDefault();
        var username = $form.find('[name="username"]').val();
        var new_password = $form.find('[name="new_password"]').val();
        var new_password_confirm = $form.find('[name="new_password_confirm"]').val();

        if ( new_password != '' && new_password_confirm != '' ){
            if ( new_password !== new_password_confirm ) {
                // swal("Gagal!", "Password tidak cocok", "error");
                Swal({
                  title: 'GAGAL!',
                  text: 'Password tidak cocok.',
                  type: 'error',
                  animation: false,
                  customClass: 'animated tada'
                });
                return false;
            } 
        } 

        swal({
            title: "Tersimpan!", 
            text: "Perubahan pengguna '"+ username +"' berhasil di simpan.", 
            type: 'success',
            confirmButtonText: 'Tutup'
        }).then(function(){
            $form.off("submit").submit(); 
        });
    
    });