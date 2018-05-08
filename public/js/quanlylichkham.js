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
  $(oForm).find('#btn_search').click(function(){
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
  $(oForm).find('#find_ngayhen,#find_trangthai,#status').change(function() {
    loadList();
  });

  $(oForm).find('#find_hienthi').change(function() {
    $value = $('#find_hienthi').val();
    if($value == 2){
      loadTable();
      $('#table-data').hide();
      $('#pagination').hide();
      $('#table-list').show();
    }
    else{
      $('#table-data').show();
      $('#pagination').show();
      $('#table-list').hide();
    }
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

  $('form#frmAddStudent').find('#btn_update').click(function(){
    add_lichkham('form#frmAddStudent', 1);
  });

  $('form#frmAddStudent').find('#btn_save_update').click(function(){
    add_lichkham('form#frmAddStudent', 2);
  });
  $('form#frmAddStudent').find('#btn_save').click(function(){
    update('form#frmAddStudent');
  });
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

loadTable = function(oForm){
  var url = '/loadTable';
  var oForm = 'form#frm_index';
  var data = $(oForm).serialize();
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
            $html +='<table class="table table-striped table-bordered dataTable no-footer hide-table" align="center" id="table-list-body">';
            $html +='<col width="10%"><col width="9%"><col width="9%"><col width="9%"><col width="9%"><col width="9%"><col width="9%">';
            $html +='<col width="9%"><col width="9%"><col width="9%"><col width="9%">';
            $html +='<thead class="thead-inverse" style="background-color: #ddd"><tr class="header" style="">';
            $html +='<td style="text-align: center;"></td>';
            $html +='<td style="text-align: center;"><b>Thứ Hai</b><br>06-05-2018</td>';
            $html +='<td style="text-align: center;"><b>Thứ Ba</b><br>07-05-2018</td>';
            $html +='<td style="text-align: center;"><b>Thứ Tư</b><br>08-05-2018</td>';
            $html +='<td style="text-align: center;"><b>Thứ Năm</b><br>09-05-2018</td>';
            $html +='<td style="text-align: center;"><b>Thứ Sáu</b><br>10-05-2018</td>';
            $html +='<td style="text-align: center;"><b>Thứ Bảy</b><br>11-05-2018</td>';
            $html +='<td style="text-align: center;"><b>Chủ Nhật</b><br>12-05-2018</td>';
            $html +='<td style="text-align: center;"><b>Thứ Hai</b><br>13-05-2018</td>';
            $html +='<td style="text-align: center;"><b>Thứ Ba</b><br>14-05-2018</td>';
            $html +='</tr></thead><tbody></tbody></table>';
            $('#table-list').html($html);
            $html = '';
            $html += '<tr>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">Buổi sáng</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + (dem++) + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].hotenbenhnhan + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].gioitinh + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].diachi + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].dienthoai + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].lido + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].thoigian + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].ngayhen + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].trangthai + '</td>';
            $html += '</tr>';
            $html += '<tr>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">Buổi Chiều</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + (dem++) + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].hotenbenhnhan + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].gioitinh + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].diachi + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].dienthoai + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].lido + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].thoigian + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].ngayhen + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[0].trangthai + '</td>';
            $html += '</tr>';
            $('#table-list-body tbody').html($html);
      }
    });
}


loadList = function(oForm){
  var url = '/loadList';

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
        dem = 1;
        if(data) {
          for(x in data) {
            $html += '<tr>';
            $html += '<td style="text-align: center;"><input ondblclick="" onclick="{select_checkbox_row(this);}" name="chk_item_id" value="' + data[x].id + '" type="checkbox"></td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + (dem++) + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[x].hotenbenhnhan + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[x].gioitinh + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[x].diachi + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[x].dienthoai + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[x].lido + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[x].thoigian + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[x].ngayhen + '</td>';
            $html += '<td class="data" ondblclick="" onclick="{select_row(this);}" style="text-align: center;">' + data[x].trangthai + '</td>';
            $html += '</tr>';
          }
        }
        $('#table-data tbody').html($html);
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

add = function (oForm) {
  var url = '/add';
  var data = $(oForm).serialize();
  $.ajax({
      url: url,
      type: "POST",
      data:data,
      success: function(arrResult){
         $('#addModal').html(arrResult);
         $('#addModal').modal('show');
         $('#btn_save').hide();
         loadevent();
      }
  });
}

add_lichkham = function(oForm, type){
  var url = '/lichkham_add';
  if($(oForm).valid()) {
  // if(1==1) {
    var data = $(oForm).serialize();
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        //cache: true,
        data:data,
        success: function(arrResult){
            if(arrResult['success']){
              if(type == 1){
                $('#addModal').modal('hide');
              }
              else{
                $("input").val("");
                $("textarea").val("");
              }
                loadList(oForm);
                alertMessage('success',arrResult['message']);
            }else{
                alertMessage('danger',arrResult['message']);
            }
        },
        error: function(arrResult) {
            alertMessage('warning',arrResult.responseJSON[Object.keys(arrResult.responseJSON)[0]]);
        }
    }); 
  }
}

deletee = function(oForm){
  var url = '/delete';
  var data = $(oForm).serialize();
  var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
  var listitem = '';
  var i =0;
  $(p_chk_obj).each(function() {
      if ($(this).is(':checked')) {
        if(listitem!==''){
          listitem +=  ','+$(this).val();
        }else{
          listitem = $(this).val();
        }
        i++;
      }
  });
  data +='&listitem=' + listitem;
    $.ajax({
        url: url,
        type: "POST",
        //cache: true,
        dataType: 'json',
        data:data,
        success: function(arrResult){
          loadList(oForm);
        }
    });

}

edit = function(oForm){
  var url = '/edit';
  var data = $(oForm).serialize();
  var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
  var listitem = '';
  var i =0;
  $(p_chk_obj).each(function() {
      if ($(this).is(':checked')) {
        if(listitem!==''){
          listitem +=  ','+$(this).val();
        }else{
          listitem = $(this).val();
        }
        i++;
      }
  });
  if(listitem == ''){
     alertMessage('danger',"Bạn chưa chọn danh mục cần sửa");
     return false;
  }
  if(i>1){
     alertMessage('danger',"Bạn chỉ được chọn một danh mục để sửa");
     return false;
  }
  data +='&itemId=' + listitem;
  $.ajax({
      url: url,
      type: "POST",
      //cache: true,
      data:data,
      success: function(arrResult){
           $('#addModal').html(arrResult);
           $('#addModal').modal('show');
           $('#btn_update').hide();
           $('form#frmAddStudent').find('#btn_save').click(function(){
              update('form#frmAddStudent', listitem);
           });
      }
  });
}

update = function(oForm, listitem){
  var url = '/update';
  if($(oForm).valid()) {
    var data = $(oForm).serialize();
    data +='&itemId=' + listitem;
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        //cache: true,
        data:data,
        success: function(arrResult){
            if(arrResult['success']){
                $('#addModal').modal('hide');
                loadList(oForm);
                alertMessage('success',arrResult['message']);
            }else{
                alertMessage('danger',arrResult['message']);
            }
        },
        error: function(arrResult) {
            alertMessage('warning',arrResult.responseJSON[Object.keys(arrResult.responseJSON)[0]]);
        }
    });
  }
}

function select_checkbox_row(obj){
    if (obj.checked) {
        $(obj).parent().parent().addClass('selected');
        $(obj).prop('checked',true);
        $(obj).prop('checked','checked');
    }
    else{
        $(obj).parent().parent().removeClass('selected');
        $(obj).prop('checked',false);
    }
}
//Ham checkbox all
function checkbox_all_item_id(p_chk_obj){
    var p_chk_obj = $('#table-data').find('input[name="chk_item_id"]');
    var v_count = p_chk_obj.length;
    //remove class cua tat ca cac tr trong table
    if ($('[name="chk_all_item_id"]').is(':checked')) {
        $(p_chk_obj).each(function() {
          $(this).prop('checked',true);
           $(this).parent().parent().addClass('selected');
        });
    }else{
        $(p_chk_obj).each(function() {
          $(this).prop('checked',false);
           $(this).parent().parent().removeClass('selected');
        });   
    }
}

function select_row(obj){
    var oTable = $(obj).parent().parent().parent();
    $(oTable).find('td').parent().removeClass('selected');
    $(oTable).find('td').parent().find('input[name="chk_item_id"]').prop('checked',false);
    $(obj).parent().addClass('selected');
    var attDisabled = $(obj).parent().find('input[name="chk_item_id"]').prop('disabled');
    if(typeof(attDisabled) === 'undefined' || attDisabled == ''){
        $(obj).parent().find('input[name="chk_item_id"]').prop('checked',true);
        $(obj).parent().find('input[name="chk_item_id"]').prop('checked','checked');
    }
}