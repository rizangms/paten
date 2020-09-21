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
            text: "Pengguna '" + username + "' berhasil ditambahkan.", 
            type: 'success',
            confirmButtonText: 'Tutup'
        }).then(function(){
            $form.off("submit").submit();
        });
    });