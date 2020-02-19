<div class="row">
     <div class="col-md-12">
          <div class="tile">
               <div class="tile-title-w-btn">
                    <h3 class="title">Files</h3>
                    <?php if($this->session->userdata('user_type') == 1): ?>
                         <div class="form-group">
                              <a href="" class="btn btn-success" data-toggle="modal" data-target="#uploadFileModal"><i class="fa fa-upload"></i> Upload File</a>
                         </div>
                    <?php endif;?>
               </div>
               <div class="tile-body table-responsive">
                    <table class="table table-bordered table-hover">
                         <thead>
                              <?php if($this->session->userdata('user_type') == 0): ?>
                                   <th style="width:5%;">Uploaded By</th>
                              <?php endif;?>
                              <th style="width:5%;">File Name</th>
                              <th style="width:10%;">Uploaded Date</th>
                              <th style="width:1%;text-align:center;">Action</th>
                         </thead>
                         <tbody>
                              <?php foreach($files as $key => $value): ?>
                                   <tr>
                                        <?php if($this->session->userdata('user_type') == 0): ?>
                                             <td><?php echo $value['first_name'].' '.$value['last_name']; ?></td>
                                        <?php endif;?>
                                        <td><?php echo $value['file_name']; ?></td>
                                        <td><?php echo $value['uploaded_date']; ?></td>
                                        <td style="text-align:center;">
                                             <div class="btn-group">
                                                  <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                                  <a href="<?php echo base_url('files/download_file/'.$value['file_id']); ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endforeach; ?>
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>
<div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
               <form id="upload_file" action="<?php echo base_url('files/upload_file'); ?>">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label>File Name:</label>
                                        <input type="text" class="form-control" name="file_name" placeholder="File Name"/>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label>Select File:</label>
                                        <div class="custom-file">
                                             <input type="file" name="file_upload" class="custom-file-input">
                                             <label class="custom-file-label">Choose file</label>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    </div>
               </form>
          </div>
     </div>
</div>
