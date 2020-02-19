          <script src="<?php echo base_url('static/js/jquery-3.2.1.min.js'); ?>"></script>
          <script src="<?php echo base_url('static/js/popper.min.js'); ?>"></script>
          <script src="<?php echo base_url('static/js/bootstrap.min.js'); ?>"></script>
          <script src="<?php echo base_url('static/js/main.js'); ?>"></script>
          <script type="text/javascript">
               $('.login-content [data-toggle="flip"]').click(function() {
      	          $('.login-box').toggleClass('flipped');
      	          return false;
               });
               $(document).on('submit','#registration_form',function(e){
                    e.preventDefault();
                    var formdata = new FormData($(this)[0]);
                    $.ajax({
                         url: "<?php echo base_url('createaccount'); ?>",
                         data: formdata,
                         type: 'POST',
                         contentType: false,
                         processData: false,
                         success:function(data){
                              var obj = $.parseJSON(data);
                              var alert_class = 'alert-success';
                              if(obj.is_error == '1'){
                                   alert_class = 'alert-danger';
                              }
                              var str = '<div class="alert alert-dismissible '+alert_class+'">';
                                   str += '<button class="close" type="button" data-dismiss="alert">×</button>';
                                   if(obj.is_error == '1'){
                                        str += '<ul>';
                                        $.each(obj.msg,function(a,b){
                                             str += b;
                                        });
                                        str += '</ul>';
                                   } else{
                                        str += obj.msg;
                                        $('#registration_form').trigger('reset');
                                   }
                              str += '</div>';
                              $('#registration_result').html(str);
                         }
                    });
               });
          </script>
     </body>
</html>
