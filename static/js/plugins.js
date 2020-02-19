$(document).ready(function(){
     var base_url = $('.base_url').val();

     var table_user = $("#tbl_users").DataTable({
          "processing": true,
          "serverSide": true,
          "order": [[0,'desc']],
          "columns":[
               {"data":"user_id"},
               {"data": "user_id","render":function(data, type, row, meta){
                         var str = '';
                         str += row.first_name+" "+row.last_name;
                         return str;
                    }
               },
               {"data":"email"},
               {"data": "user_id","render":function(data, type, row, meta){
                         var str = '';
                         str += (row.status == '1') ? 'Activate' : 'Inactive';
                         return str;
                    }
               },
               {"data": "user_id","render":function(data, type, row, meta){
                         var str = '';
                         str += '<div class="btn-group">';
                              if(row.status == '1'){
                                   str += '<a href="" class="btn btn-warning btn-sm user_action_status" data-id="'+row.user_id+'" data-status="0"><i class="fa fa-lock"></i> Deactivate</a>';
                              } else{
                                   str += '<a href="" class="btn btn-success btn-sm user_action_status" data-id="'+row.user_id+'" data-status="1"><i class="fa fa-unlock"></i> Activate</a>';
                              }
                              str += '<a href="" class="btn btn-danger btn-sm delete_user_action" data-id="'+row.user_id+'"><i class="fa fa-trash"></i> Delete</a>';
                              str += '<a href="" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> View</a>';
                         str += '</div>';
                         return str;
                    }
               },
          ],
          "ajax": {
               "url": base_url+"users/get_users",
               "type": "POST"
          },
          "columnDefs": [
               {
                    "targets": [],
                    "orderable": false,

                },
           ],
     });
     var tbl_lead_order = $("#tbl_lead_order").DataTable({
          "processing": true,
          "serverSide": true,
          "order": [[0,'desc']],
          "columns":[
               {"data": "first_name","render":function(data, type, row, meta){
                         var str = '';
                         str += row.first_name+" "+row.last_name;
                         return str;
                    }
               },
               {"data":"start_date"},
               {"data":"time"},
               {"data":"mile"},
               {"data": "user_id","render":function(data, type, row, meta){
                         var str = '';
                         str += '<div class="btn-group">';
                              str += '<a href="" class="btn btn-danger btn-sm delete_lead_order_action" data-id="'+row.id+'"><i class="fa fa-trash"></i> Delete</a>';
                         str += '</div>';
                         return str;
                    }
               },
          ],
          "ajax": {
               "url": base_url+"leadorder/get_leadorder",
               "type": "POST"
          },
          "columnDefs": [
               {
                    "targets": [],
                    "orderable": false,

                },
           ],
     });

     $(document).on('click','.user_action_status',function(e){
          e.preventDefault();
          var id = $(this).attr('data-id');
          var status = $(this).attr('data-status');
          var btn_text = 'Deactivate';
          var btn_class = 'btn-red';
          var alert_type = 'red';
          var alert_title = 'Deactivate User';
          var alert_content = 'Are you sure, you want to deactivate this user?';
          if(status == '1'){
               btn_text = 'Activate';
               btn_class = 'btn-green';
               alert_type = 'green';
               alert_title = 'Activate User';
               alert_content = 'Activating this User';
          }
          $.confirm({
               title: alert_title,
               content: alert_content,
               type: alert_type,
               typeAnimated: true,
               buttons: {
                    tryAgain: {
                         text: btn_text,
                         btnClass: btn_class,
                         action: function(){
                              $.ajax({
                                   url:base_url+"users/action_user",
                                   type:'post',
                                   data:{
                                        'id':id,
                                        'status':status,
                                   },success:function(data){
                                        table_user.ajax.reload();
                                   }
                              });
                         }
                    },
                    close: function () {
                    }
               }
          });
     });

     $(document).on('click','.delete_user_action',function(e){
          e.preventDefault();
          var id = $(this).attr('data-id');
          $.confirm({
               title: 'Delete User',
               content: 'Are you sure, you want to delete this user?',
               type: 'red',
               typeAnimated: true,
               buttons: {
                    tryAgain: {
                         text: 'Delete',
                         btnClass: 'btn-red',
                         action: function(){
                              $.ajax({
                                   url:base_url+"users/delete_user",
                                   type:'post',
                                   data:{
                                        'id':id,
                                   },success:function(data){
                                        table_user.ajax.reload();
                                   }
                              });
                         }
                    },
                    close: function () {
                    }
               }
          });
     });

     $(document).on('click','.delete_lead_order_action',function(e){
          e.preventDefault();
          var id = $(this).attr('data-id');
          $.confirm({
               title: 'Delete data',
               content: 'Are you sure, you want to delete this data?',
               type: 'red',
               typeAnimated: true,
               buttons: {
                    tryAgain: {
                         text: 'Delete',
                         btnClass: 'btn-red',
                         action: function(){
                              $.ajax({
                                   url:base_url+"leadorder/delete_lead_order",
                                   type:'post',
                                   data:{
                                        'id':id,
                                   },success:function(data){
                                        tbl_lead_order.ajax.reload();
                                   }
                              });
                         }
                    },
                    close: function () {
                    }
               }
          });
     });

     $(document).on('submit','#upload_file',function(e){
          e.preventDefault();
          var formdata = new FormData($(this)[0]);
          $.ajax({
              type: 'post',
              url: $(this).attr('action'),
              data: formdata,
              processData: false,
              contentType: false,
              success: function(data) {

              }
          });
     });

});
