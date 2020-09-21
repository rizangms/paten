      $(document).ready(function () {
        notify_content();
        cek_notify();
          var current = window.location.href.split('#')[0];
          $('#nav li').each(function(){
              current = current.replace(/\/#/, '/');
              var $this = $(this);
              var arr_cur = current.split('/');
              var arr_url = $this.find('a').attr('href').split('/');
              var dowo = arr_url.length;
              if( arr_url[(dowo-1)] === arr_cur[(dowo-1)] ){
                  $this.addClass('active');
              } 
          });
      });

      function cek_notify() {
        $.ajax({ 
            url: base_url + '/json/data?get=notify', 
            success: function(data){
              if ( data.data > 0) {
                  $('.ada-notif').addClass('newmessage');
                  $('#lampu_notif').fadeIn().addClass('badge bg-c-red');
                  $('#notify_label').fadeIn().text( data.data );
                  $('#notify_label').fadeIn().show();
              } else {
                setTimeout(function(){ 
                  $('.newmessage').addClass('hovered');
                  $('#lampu_notif').fadeOut().removeClass("badge bg-c-red", 1000);
                  $('#notify_label').fadeOut();
                }, 1500);
              }              
          }, dataType: "json"});
      }

      setInterval(function(){
        if ( $('#show_notify').css('display') == 'block' ) {
          setTimeout(function(){ 
            $('.newmessage').addClass('hovered');
            $('#lampu_notif').fadeOut().removeClass("badge bg-c-red", 1000);
            $('#notify_label').fadeOut();
            read_notify();
          }, 6000);
        }
          // $('#show_the_notify').empty();
          notify_content();
          cek_notify();
      }, 15000);

      function notify_content() {
        var list_notify = $('#show_the_notify');
        var myHTML = '';
        $.ajax({
          url: base_url + "/json/data?get=notify_content",
          data: 'data',
          success: function(data){
            var json = JSON.parse(data);
            if ( json.data == false ) {
              myHTML += '<li class="py-5 waves-effect waves-light">';
              myHTML += '<div class="media">';
              myHTML += '<div class="media-body">';
              myHTML += '<p class="notification-msg text-center">Tidak ada notifikasi</p>';
              myHTML += '</div></div></li>';
            } else {
            // console.log(json.data);
              for(var k in json.data) {
                myHTML += '<li class="waves-effect waves-light '+json.data[k].notify+'">';
                myHTML += '<a href="'+json.data[k].alamat_link+'">';
                myHTML += '<div class="media">';
                myHTML += '<div class="media-body">';
                myHTML += '<h5 class="notification-user">'+json.data[k].nama+ ( json.data[k].alasan == 'revisi' ? ' <i>(Revisi)</i>' : '' ) +'</h5>';
                myHTML += '<p class="notification-msg">'+json.data[k].jenis+'</p>';
                myHTML += '<span class="notification-time">'+json.data[k].tanggal+'</span>';
                myHTML += '</div></div></a></li>';
              }
            }
            // myHTML += '<li class="waves-effect waves-light"><a class="text-center" href="#"><div class="media"><div class="media-body">Lainnya</div></div></a></li>';
            list_notify.html(myHTML);
          }
        });
      }

      function read_notify() {
        jQuery.ajax({
          type: "GET",
          url: base_url + "/json/data?get=notify&data=true",
          cache: false,
          success: function(response)
          {
            cek_notify();
          }
         });
      }

      $('#notify_off').click(function () {
        setTimeout(function(){ 
          $('.newmessage').addClass('hovered');
          $('#lampu_notif').fadeOut().removeClass("badge bg-c-red", 1000);
          $('#notify_label').fadeOut();
          read_notify();
        }, 1500);
      });