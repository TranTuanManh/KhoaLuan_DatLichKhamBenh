/**
 * Hàm load các sử kiện cho màn hình index
 *
 * @return void
 */
alertMessage = function (type,message,s = 3000){
    var vclass = 'alert';
    lclass = 'fa';
    if(type=='success'){
      vclass += ' alert-success';
    }else if(type=='infor'){
      vclass += ' alert-infor';
    }else if(type=='warning'){
      vclass += ' alert-warning';
    }else if(type=='danger'){
      vclass += ' alert-danger';
    }
    $("#message-alert").alert();
    $("#message-alert").removeClass();
    $("#message-alert").addClass(vclass);
    $("#message-infor").html(message);
    $("#message-alert").fadeTo(s, 500).slideUp(500, function(){
      $("#message-alert").slideUp(500);
    })
}

loadIndex = function(){
  var oForm = 'form#frm_index';
  loadList();
  $('#btn_search').click(function(){
    loadList();
  });
  $(oForm).find('#btn_add').click(function(){
    add(oForm);
  });
  $(oForm).find('#btn_edit').click(function(){
    edit(oForm);
  });
  $(oForm).find('#btn_delete').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    onConfirm: function() {
    deletee(oForm);
    }
  });
  $('.chzn-select').chosen({ width: '100%' });
  $(oForm).find('#find_chuyenkhoa,#find_hocvi,#find_tinh').change(function() {
    loadList();
  });
  addShortcut();
}

/**
 * Hàm load các sử kiện cho màn hình khác
 *
 * @param oForm (tên form)
 *
 * @return void
 */
loadevent = function(){
}

/**
 * Hàm thiet lap lai cac su kien khi quay tro ve man hinh chinh
 *
 * @param oForm (tên form)
 *
 * @return void
 */
backIndex = function(){
  shortcut.remove("Enter");
  loadList();
}
addShortcut = function(){
  shortcut.add("Enter",function() {
    loadList();
  });
}

loadList = function(oForm){
  var url = '/danh-sach/LoadBacSi';

  var oForm = 'form#frm_index';
  var currentPage = $(oForm).find('#_currentPage').val();
  currentPage = (!currentPage) ? 1 : currentPage;
  var perPage = $(oForm).find('#cbo_nuber_record_page').val();
  perPage     = (!perPage) ? 15 : perPage;

  var data = $(oForm).serialize();
  data +='&currentPage=' + currentPage;
  data +='&perPage=' + perPage;
  $.ajax({
      url: url,
      type: "POST",
      dataType: 'json',
      //cache: true,
      data:data,
      success: function(arrResult){
        // arrResult = $.parseJSON(arrResult);
        var $html = '', data;
        data = arrResult.Dataloadlist;
        if(data) {
          for(x in data) {
            $html += '<div class="row"><div class="panel panel-default list-bacsi">';
            $html += '<div class="content-body"><div class="row"><div class="title">';
            $html += '</div></div><div class="row row1"><div class="col-md-2"><a><img src="'+ data[x].avatar +'" width="180px" height="180px"></a>';
            $html += '</div><div class="col-md-10"><b style="color: #00bfbf; font-size: 21px">Bác sĩ '+ data[x].hoten +'</b><br><br>';
            $html += '<i class="fa fa-graduation-cap" style="color: black"></i><b>Học vị: <span style="color: #00bfbf"> '+ data[x].hocvi +'</span></b><br><br>';
            $html += '<i class="fa fa-stethoscope" style="color: black"></i><b> Chuyên khoa: <span style="color: #00bfbf"> '+ data[x].khoalamviec +'</span></b><br><br>';
            $html += '<i class="fa fa-book" style="color: black"></i><b> Kinh nghiệm làm việc: <span style="color: #00bfbf"> '+ data[x].kinhnghiem +'</span></b><br><br>';
            $html += '<i class="fa fa-hospital-o" style="color: black"></i><b> Nơi làm việc: <span style="color: #00bfbf"> '+ data[x].diachi +'</span></b><br><br>';
            $html += '<i class="fa fa-phone" style="color: black"></i><b> Điện thoại liên hệ: <i style="color: #00bfbf"> '+ data[x].dienthoai +'</i></b>';
            $html += '<a href="/dat-lich-kham-ngay/'+ data[x].id +'" class="btn btn-primary xuli" type="button" name="" style="margin-bottom: 10px; margin-top: 50px; font-size:18px">Đặt lịch khám nhanh <i class="fa fa-chevron-right"></i></a>';
            $html += '</div></div></div></div></div>';
          }
        }
        $('#content-list').html($html);
        $('#pagination').html(arrResult.pagination);
        $(oForm).find('.main_paginate .pagination a').click(function(){
          $(oForm).find('#_currentPage').val($(this).attr('page'));
          loadList();
        });
        $(oForm).find('#cbo_nuber_record_page').change(function(){
          loadList();
        });
        $(oForm).find('#cbo_nuber_record_page').val(arrResult.perPage);
      }
  });
}
