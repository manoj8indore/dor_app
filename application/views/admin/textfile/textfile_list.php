                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h5 class="my-auto font-weight-bold text-primary">View Log</h5>
                           
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-black">
                                            <th>Sr.</th>
                                            <th>Vehicle</th>
                                            <th>Create Date/Time</th>
                                            <th>Log Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($record as $data) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo ucwords($data->name); ?></td>
                                            <td><?php echo ucwords($data->created_at); ?></td>
                                            <td><?php if($data->log_category == "readpin"){ echo "Read Pin"; }
                                            if($data->log_category == "addkeyfob"){ echo "Add Keyfob"; } ?></td> 
                                            <td class="action-icons">
                                                <a href="<?php echo base_url().'Admin/Textfile/download/'.$data->id; ?>">
                                               <b class="btn-sm btn-success"><?php echo $data->text_file; ?></b></a> &nbsp;&nbsp;
                                                <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $data->id ?>">
                                               <i class="fas fa-trash text-sm text-danger"></i></a>
                                            </td>
                                        </tr>
                                     <!-- Delete Modal-->
                <div class="modal fade" id="deleteModal<?php echo $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="logoutModalLabel">Are you sure you're going out?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3 mb-4">Select the "Confirm" button below if you are ready to delete record.</div>
                            <div class="modal-footer d-flex m-3">
                                <button class="flex-fill btn btn-secondary p-2 rounded-pill" type="button" data-dismiss="modal">Cancel</button>
                                <a class="flex-fill btn btn-danger p-2 rounded-pill" href="<?php echo base_url().'Admin/Textfile/delete?id='.$data->id; ?>">Confirm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Delete Modal -->
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

     

            

            