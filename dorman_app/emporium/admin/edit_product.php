<?php include('header.php') ?>

<?php  

if(isset($_REQUEST['editProduct']))
{
     $product_name = trim($_REQUEST['product_name']);
     $product_price = trim($_REQUEST['product_price']);
     $product_currency = trim($_REQUEST['product_currency']);
     $description = trim($_REQUEST['description']);
     
      $id = trim($_REQUEST['id']);
     $filename = $_FILES["fileToUpload"]["name"];
    if($filename!=''){
        $imgname = $filename; 
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder = "../uploads/".$filename;
    move_uploaded_file($tempname, $folder);
}else{
    $imgname = trim($_REQUEST['imgupload']); 
}

$sql = "UPDATE tbl_project SET product_name='$product_name', product_price='$product_price', product_currency='$product_currency',description='$description',image='$imgname' WHERE product_id ='$id'";

if ($conn->query($sql) === TRUE) {
?>
     <script>
    window.top.location.href='collection_list.php?success=Record update successfully"';
    </script>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
     }
     ?>

<section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Product <?php   $id = $_GET['id']; ?> </h4>
                    </div>
                     <?php   
                                     
                                      ?>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="edit_product.php" method="post"    enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                  <?php   
                                  $sql = "SELECT * FROM tbl_project WHERE product_id='$id' ";
                                      $result = $conn->query($sql);
                                       if ($result->num_rows > 0) {
                                       // output data of each row
                                       while ($row = $result ->fetch_assoc()) { ?>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product Name</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="Product Name" name="product_name" value="<?php echo $product_name = $row["product_name"]; ?>" required=''>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Product Price</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Product Price" name="product_price" required='' value="<?php echo $product_price = $row["product_price"]; ?>">
                                        </div>
                                    </div>
                                   
                                 
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Product Currency</label>
                                            <input type="text" id="company-column" class="form-control" name="product_currency" placeholder="Product Currency" value="<?php echo $product_currency = $row["product_currency"]; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Description</label>
                                            <textarea class="form-control" name="description" ><?php echo $description = $row["description"]; ?></textarea>
                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Image</label>
                                          <input type="file" class="form-control" name="fileToUpload">
                                          <input type="hidden" name="imgupload" value="<?php echo $image = $row["image"]; ?>">
                                          <br/>
                                          <img src="../uploads/<?php echo $image = $row["image"]; ?>" style="width: 100px; height: 100px;">
                                            
                                        </div>
                                    </div>
                                    
                                   <?php } } ?>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" name="editProduct" class="btn btn-primary mr-1 mb-1">Edit</button>
                                       
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

                    
                <!-- /.container-fluid -->

<?php include('footer.php') ?>