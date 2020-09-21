"use strict";
$("#list-user").dataTable({
    ajax: base_url + "/api/user",
    dataSrc: 'data',
    columns: [
        { data: 'username', className: 'pl-4 align-middle username' },
        { data: 'name', className: 'align-middle' },
        { data: 'email', className: 'align-middle' },
        { data: 'aksi', className: 'align-middle' },
    ],
    autoWidth: false,
    language: {
        "search":"Cari ",
        "info":"Menampilkan _START_ - _END_ dari _TOTAL_",
        "infoEmpty":"Menampilkan 0 - 0 dari 0",
        "infoFiltered":"(disaring dari _MAX_)",
        "lengthMenu":"Tampilkan _MENU_",
        "loadingRecords":"Sedang memuat...",
        "zeroRecords":"Tidak ada yang ditemukan.",
        "emptyTable":"Tidak ada data."
    },
    initComplete: function( settings, json ) {
        var api = this.api();
        if ( !json.data.length ) {
            $(this).parent().find(".dataTables_length").remove();
            $(this).parent().find(".dataTables_info").remove();
            $(this).parent().find(".dataTables_paginate").remove();
            $(this).parent().find(".dataTables_filter").remove();
        } else {
            var $searchForm = $('.dataTables_filter');
            $searchForm.find('input').attr({ placeholder: $searchForm.find('label').text() }).css({ width: '15em' });
            $searchForm.addClass('pt-1');
            $searchForm.find('input').addClass('rounded align-middle');
            $searchForm.find('input').parent().contents()[0].remove();
            $searchForm.find('input').unwrap();

            var $dataInfo = $('.dataTables_length');
            $dataInfo.addClass('pt-2');
            $dataInfo.find('select').addClass('rounded align-middle').css({ 'border': '2px', 'border-style': 'outset' });

            $('dataTables_info').addClass('pt-1');

        }
    },
    drawCallback: function( settings ) {
        $(this).parent().find('.dropdown-trigger').dropdown({ alignment: 'right' });
        $(this).parent().find('.dataTables_paginate > *').addClass('btn btn-floating');
        $(this).parent().find('.dataTables_paginate > .previous').html('<i class="fa fa-arrow-left "></i>').css('margin', '0 -10px');
        $(this).parent().find('.dataTables_paginate > .next').html('<i class="fa fa-arrow-right "></i>').css('margin', '0 0 0 -4px');
        $(this).parent().find('.dataTables_paginate > span').css('margin', '0 -10px');
        $(this).parent().find('.dataTables_paginate > span > a').addClass('px-2');
    },
});

function del_user(el){
    var id = $(el).data('id'),
        username = $(el).parents('tr').find('.username').text();

    Swal({
      title: 'Anda yakin?',
      text: "Pengguna \""+ username +"\" akan dihapus!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!',
      cancelButtonText: 'Batal',
      animation: false,
      customClass: 'animated tada'
    }).then((result) => {
      if (result.value) {
        Swal(
          'Berhasil di hapus!',
          "Pengguna \""+ username +"\" berhasil di hapus.",
          'success'
        ).then(function(){
            location.href=base_url + "/users/del/" + id;
        });
      }
    })
}