<section class="material-half-bg">
     <div class="cover"></div>
</section>
<section class="login-content">
     <div class="logo">
          <h1>Portal</h1>
     </div>
     <div class="login-box">
          <form class="login-form" method="post" action="<?php echo base_url('auth'); ?>">
               <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
               <?php if(isset($msg)): ?>
                    <div class="form-group">
                         <div class="alert alert-dismissible alert-danger">
                              <button class="close" type="button" data-dismiss="alert">×</button>
                              <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo $msg; ?>
                         </div>
                    </div>
               <?php endif; ?>
               <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input class="form-control" type="text" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>">
               </div>
               <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control" type="password" placeholder="Password" name="password">
               </div>
               <div class="form-group">
                    <div class="utility">
                         <p class="semibold-text mb-2"><a href="#" data-toggle="modal" data-target="#registrationModal">Create Account</a></p>
                         <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                    </div>
               </div>
               <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
               </div>
          </form>
          <form class="forget-form" action="index.html">
               <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
               <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Email">
               </div>
               <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
               </div>
               <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
               </div>
          </form>
     </div>
</section>
<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
               <form id="registration_form">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Create an account</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-12">
                                   <div id="registration_result">
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="control-label">USERNAME <span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" placeholder="Username" name="username" required>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="control-label">EMAIL <span style="color:red;">*</span></label>
                                        <input class="form-control" type="email" placeholder="Email" name="email" required>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="control-label">PASSWORD <span style="color:red;">*</span></label>
                                        <input class="form-control" type="password" placeholder="Password" name="password" required>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="control-label">CONFIRM PASSWORD <span style="color:red;">*</span></label>
                                        <input class="form-control" type="password" placeholder="Confirm Password" name="confirm_password" required>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="control-label">FIRST NAME <span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" placeholder="First Name" name="first_name" required>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label class="control-label">LAST NAME <span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" placeholder="Last Name" name="last_name" required>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-12">
                                   <div class="form-group">
                                        <label class="control-label">ADDRESS <span style="color:red;">*</span></label>
                                        <input class="form-control" type="text" placeholder="Address" name="address" required>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
               </form>
          </div>
     </div>
</div>
