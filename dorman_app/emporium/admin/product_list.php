<?php include('header.php') ?>

 
            <?php if(isset($_REQUEST['success'])){ ?>  
                  <div class="alert alert-info">
                <?php  echo "<h5 style='color:green;' align='center'; > ".$_REQUEST['success']."</h5>"; ?>    
                  </div>
              <?php } ?> 
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $catid = $_GET['id']; ?> List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr> 
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                           
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                     
                                       <tbody>
                                     <?php   
                                     $catid = $_GET['id'];
                                      $sql = "SELECT * FROM tbl_project where category_name='$catid' ORDER BY product_id DESC";
                                      $result = $conn->query($sql);
                                       if ($result->num_rows > 0) {
                                        $i=1;
                                       // output data of each row
                                       while($row = $result->fetch_assoc()) { ?>
                                       <tr>
                                        <td><?php echo $i; ?>
                                            <td><?php echo $product_name = $row["product_name"]; ?></td>
                                            <td><?php echo $category_name = $row["category_name"]; ?></td>
                                            <td><?php echo $product_currency = $row["product_currency"]; echo $product_price = $row["product_price"]; ?></td>
                                            
                                            <td><?php echo $description = $row["description"]; ?></td>
                                            <?php  $id = $row["product_id"]; ?>
                                            <td><a href="edit_product.php?id=<?php echo $id; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                                          <a href="product_delete.php" onclick="return confirm('Are you sure delete this product?')" href="product_delete.php?id=<?php echo $id; ?>"><i class="fa fa-trash" ></i></a>
                                            </td>
                                        </tr>
                                  <?php $i++; } 
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


<?php include('footer.php') ?>