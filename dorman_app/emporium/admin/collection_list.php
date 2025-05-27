<?php include('header.php') ?>

 
           <?php if(isset($_REQUEST['success'])){ ?>  
                  <div class="alert alert-info">
                <?php  echo "<h5 style='color:green;' align='center'; > ".$_REQUEST['success']."</h5>"; ?>    
                  </div>
              <?php } ?> 
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Category List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr> 
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                     
                                       <tbody>
                                           <tr>
                                             <td>1</td>
                                            <td>Saree</td>
                                            <td><a href="product_list.php?id=Saree"><i class="fa fa-eye"></i>&nbsp; View List</a> &nbsp;
                                            <a href="add_product.php?id=Saree"><i class="fa fa-plus"></i>&nbsp; Add</a> &nbsp;</td>
                                            </tr>
                                        <tr>
                                            <td>2</td>
                                         <td>Suit</td>
                                         <td><a href="product_list.php?id=Suit"><i class="fa fa-eye"></i>&nbsp; View List</a> &nbsp;
                                             <a href="add_product.php?id=Suit"><i class="fa fa-plus"></i>&nbsp; Add</a> &nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                        <td>Dupatta</td>
                                         <td><a href="product_list.php?id=Dupatta"><i class="fa fa-eye"></i>&nbsp; View List</a> &nbsp; 
                                         <a href="add_product.php?id=Dupatta"><i class="fa fa-plus"></i>&nbsp; Add</a> &nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                        <td>Stole</td>
                                         <td><a href="product_list.php?id=Stole"><i class="fa fa-eye"></i>&nbsp; View List</a> &nbsp; 
                                         <a href="add_product.php?id=Stole"><i class="fa fa-plus"></i>&nbsp; Add</a> &nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                        <td>Jacket</td>
                                        <td><a href="product_list.php?id=Jacket"><i class="fa fa-eye"></i>&nbsp; View List</a> &nbsp;
                                        <a href="add_product.php?id=Jacket"><i class="fa fa-plus"></i>&nbsp; Add</a> &nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                       <td>Kurti</td>
                                       <td><a href="product_list.php?id=Kurti"><i class="fa fa-eye"></i>&nbsp; View List</a> &nbsp; 
                                       <a href="add_product.php?id=Kurti"><i class="fa fa-plus"></i>&nbsp; Add</a> &nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                        <td>Nighty</td>
                                        <td><a href="product_list.php?id=Nighty"><i class="fa fa-eye"></i>&nbsp; View List</a> &nbsp; 
                                        <a href="add_product.php?id=Nighty"><i class="fa fa-plus"></i>&nbsp; Add</a> &nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                       <td>Hand Bags</td>
                                      <td><a href="product_list.php?id=Bag"><i class="fa fa-eye"></i>&nbsp; View List</a> &nbsp; 
                                      <a href="add_product.php?id=Bag"><i class="fa fa-plus"></i>&nbsp; Add</a> &nbsp;</td>
                                        </tr>
                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


<?php include('footer.php') ?>