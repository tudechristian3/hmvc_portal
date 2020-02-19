<div class="row">
     <?php if($this->session->userdata('user_type') == 0): ?>
          <div class="col-md-6 col-lg-3">
               <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                         <h4>Users</h4>
                         <p><b><?php echo $count_user; ?></b></p>
                    </div>
               </div>
          </div>
          <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
               <div class="info">
                   <h4>Lead Order</h4>
                   <p><b><?php echo $count_lead_order; ?></b></p>
               </div>
          </div>
     <?php else: ?>
          <div class="col-md-12">
               <div class="form-group">
                    <a href="<?php echo base_url('dashboard/lead'); ?>" class="btn btn-primary" >Request Lead Order</a>
               </div>
               <div class="form-group">
                    <h2>Medicare Advantage/PDP Carrier Certification Links:</h2>
                    <ul>
                    <?php foreach($list_of_content as $key => $value): ?>
                         <li><?php echo $value['content_title']?> - <a href="<?php echo base_url('dashboard/details/'.$value['content_url']); ?>" target="_blank">Click Here for Certification</a></li>
                    <?php endforeach; ?>
               </div>
          </ul>
          </div>
          <div class="modal fade" id="LeadOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                              </button>
                         </div>
                         <div class="modal-body">
                              ...
                         </div>
                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                         </div>
                    </div>
               </div>
          </div>
     <?php endif; ?>
 </div>
