<div class="row">
     <div class="col-md-12">
          <div class="title">
               <div class="tile-body">
                    <div class="form-group">
                         <div id="calendar">
                         </div>
                    </div>
               </div>
          </div>
     </div>
 </div>
 <div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <form method="post" id="lead_order_form">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Add Request Lead Order</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <div class="row">
                              <div class="col-md-6">
                                   <!-- <div class="form-group">
                                        <label>Date:</label>
                                        <input type="text" class="form-control" name="date_lead_order" readonly/>
                                   </div> -->
                                   <div class="form-group">
                                        <label>Date:</label>
                                        <div class="input-group mb-3">
                                             <input type="text" class="form-control" id="date_lead_order" name="date_lead_order" placeholder="Date" readonly>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label>Time:</label>
                                        <div class="input-group mb-3 bootstrap-timepicker timepicker">
                                             <input type="text" class="form-control" id="time_lead_order" name="time_lead_order" placeholder="Time" readonly>
                                             <div class="input-group-prepend">
                                                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-md-12">
                                   <div class="form-group">
                                        <label>How far of a radius around your zip code, in miles, will you travel?:</label>
                                        <select class="form-control" name="miles">
                                             <option selected hidden>Select Radius</option>
                                             <option value="5">5</option>
                                             <option value="10">10</option>
                                             <option value="25">25</option>
                                             <option value="50">50</option>
                                             <option value="100">100</option>
                                             <option value="+100">+100</option>
                                        </select>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<div class="modal fade" id="getRequestLeadOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
         <div class="modal-content">
              <form method="post" id="lead_order_form">
                   <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Requested Lead Order</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                        </button>
                   </div>
                   <div class="modal-body">
                        <div class="row">
                             <div class="col-md-6">
                                  <div class="form-group">
                                       <label>Date:</label>
                                       <input type="text" class="form-control" name="view_date_lead_order" readonly/>
                                  </div>
                             </div>
                             <div class="col-md-6">
                                  <div class="form-group">
                                       <label>Time:</label>
                                       <input type="text" class="form-control" name="view_time_lead_order" readonly/>
                                  </div>
                             </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                  <div class="form-group">
                                       <label>How far of a radius around your zip code, in miles, will you travel?:</label>
                                       <select class="form-control" name="view_miles" disabled>
                                            <option selected hidden>Select Radius</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="+100">+100</option>
                                       </select>
                                  </div>
                             </div>
                        </div>
                   </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                   </div>
              </form>
         </div>
    </div>
</div>
