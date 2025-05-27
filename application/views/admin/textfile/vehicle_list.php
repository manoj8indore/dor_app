                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h5 class="my-auto font-weight-bold text-primary">Textfile List</h5>
                           
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-black">
                                            <th>Sr.</th>
                                            <th>Vehicle</th>
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
                                            <td class="action-icons">
                                                <a href="<?php echo base_url().'view_log?name='.$data->name; ?>">
                                               <b class="btn-sm btn-success">View Log</b></a>
                                            </td>
                                        </tr>

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

     

            

            