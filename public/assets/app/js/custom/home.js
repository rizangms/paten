
function sendAjaxRequest(element, url) {
    $("#list-req").dataTable({
        ajax: url,
        dataSrc: 'data',
        columns: [
            { data: 'no', className: 'pl-4 align-middle'  },
            { data: 'id', className: 'pl-4 align-middle'  },
            { data: 'nik', className: 'align-middle'},
            { data: 'nama', className: 'align-middle'},
            { data: 'alamat', className: 'align-middle'},
            { data: 'jenis', className: 'align-middle'},
            { data: 'status', className: 'align-middle'},
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
                $searchForm.find('input').addClass('rounded');
                $searchForm.find('input').parent().contents()[0].remove();
                $searchForm.find('input').unwrap();

                var $dataInfo = $('.dataTables_length');
                $dataInfo.addClass('pt-2');
                $dataInfo.find('select').addClass('rounded').css({ 'border': '2px', 'border-style': 'outset' });

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
}

$(document).ready(function(){
    get_jumlah();   
    function get_jumlah() {
        $.ajax({
            url: base_url + "/json/data?get=jumlah",
            data: 'data',
            success: function(data){
                var json = JSON.parse(data);
                $('#semuanya').html(json.data[0].semua);
                $('#suksesnya').html(json.data[0].sukses);
                $('#pendingnya').html(json.data[0].pending);
                $('#tolaknya').html(json.data[0].tolak);
            }
        });
    }
    
    setInterval(function(){
        get_jumlah();
    }, 15000);

    $("#TableWhenNeed").hide();
    $("#button_1").click(function(e){
    $("#TableWhenNeed").hide();
        $("#list-req").dataTable().fnDestroy();
        e.preventDefault();
        sendAjaxRequest($(this),base_url + "/api/permohonan");
        $("#TableWhenNeed").show();
    });

    $("#button_2").click(function(e){
    $("#TableWhenNeed").hide();
        $("#list-req").dataTable().fnDestroy();
        e.preventDefault();
        sendAjaxRequest($(this),base_url + "/api/permohonan/1");
        $("#TableWhenNeed").show();
    });

    $("#button_3").click(function(e){
    $("#TableWhenNeed").hide();
        $("#list-req").dataTable().fnDestroy();
        e.preventDefault();
        sendAjaxRequest($(this),base_url + "/api/permohonan/9");
        $("#TableWhenNeed").show();
    });

    $("#button_4").click(function(e){
    $("#TableWhenNeed").hide();
        $("#list-req").dataTable().fnDestroy();
        e.preventDefault();
        sendAjaxRequest($(this),base_url + "/api/permohonan/2");
        $("#TableWhenNeed").show();
    });
});
