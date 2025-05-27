<?php include('header.php') ?>

<?php  
if(isset($_REQUEST['addProduct']))
{
     $product_name = trim($_REQUEST['product_name']);
     $product_price = trim($_REQUEST['product_price']);
     $product_currency = trim($_REQUEST['product_currency']);
     $description = trim($_REQUEST['description']);
     $category_name = trim($_REQUEST['category_name']);
    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder = "../uploads/".$filename;
    move_uploaded_file($tempname, $folder);

     $sql = "INSERT INTO tbl_project (product_name,category_name, product_price,product_currency,description,image)
      VALUES ('$product_name','$category_name', '$product_price', '$product_currency','$description','$filename')";

if ($conn->query($sql) === TRUE) { ?>
       <script>
    window.top.location.href='collection_list.php?success=New record created successfully';
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
                        <h4 class="card-title">Add Product </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="add_product.php" method="post"    enctype="multipart/form-data">
                                  <input type="hidden"  name="category_name"  value="<?php echo $cat = $_GET['id']; ?>">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Product Name</label>
                                            <input type="text" id="first-name-column" class="form-control" placeholder="Product Name" name="product_name" required=''>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Product Price</label>
                                            <input type="text" id="last-name-column" class="form-control" placeholder="Product Price" name="product_price" required=''>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Product Currency</label>
                                            <input type="text" id="company-column" class="form-control" name="product_currency" placeholder="Product Currency" value="Rs">
                                        </div>
                                    </div>
                           

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Image</label>
                                          <input type="file" class="form-control" name="fileToUpload" required=''>
                                            
                                        </div>
                                    </div>
                                      <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Description</label>
                                            <textarea class="form-control" name="description" ></textarea>
                                            
                                        </div>
                                    </div>
                                   
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" name="addProduct" class="btn btn-primary mr-1 mb-1">Add</button>
                                       
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