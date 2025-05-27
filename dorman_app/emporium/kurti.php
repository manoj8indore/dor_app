<?php include 'header.php';?>
 <!-- Main -->
    <main id="main" class="chhap-main bg-color gray-10">

      <!-- Banner -->
      <section class="chhap-section has-overlay">
        <div class="banner">
          <div class="content-wrapper">
            <!-- Intro -->
            <div class="extended-intro max-w-65">
              <h1 class="title white">
               <!--  <span class="text-1 text-style-1">Sarees</span> -->
                <span class="text-1 text-style-1 text-italic">Latest <mark class="animated-underline primary">Designer</mark> Kurtis.</span>
              </h1>
            </div>
          </div>
          <!-- Image -->
          <div class="image-wrapper">
            <img src="assets/img/kurti.jpg" class="image vh-50 fit-cover" alt="" />
          </div>
          <!-- Overlay -->
          <div class="overlay black-50"></div>
        </div>
      </section>



<!-- Light -->
      <section class="shopp-section pt-3 pb-3 bg-color gray-10">
         <div class="gallery ">
        <div class="container">
         
          <div class="row">
            <?php   
                        $sql = "SELECT * FROM tbl_project where category_name ='Kurti'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) { 
                         while($row = $result->fetch_assoc()) { ?> 
            <div class="col-12 col-sm-6 col-md-4 col-lg-4 d-flex aligned-item-stretch pb-2">
              <div class="card shadow parent hover-up-down">
               <a href="uploads/<?php echo $image = $row["image"]; ?>" class="item lightbox-link ">
               
                <div class="image-wrapper12 image-wrapper shadow rounded">
                  <div class="overlay black-50"></div>
                  <img src="uploads/<?php echo $image = $row["image"]; ?>" class="vh-50 image" alt="<?php echo $description = $row["description"]; ?>" />
                </div>
              </a>
              <div class="card-body bg-color white">
                          <h3 class="title text-style-11 black"><?php echo $product_name = $row["product_name"]; ?></h3>
                          <p class="description"><?php echo $description = $row["description"]; ?></p>
                          <div class="card-flex-wrapper">
                            <span class="fw-600 text-color black"><mark class="animated-underline tertiary active"><?php echo $product_currency = $row["product_currency"]; echo $product_price = $row["product_price"]; ?></mark></span>
                           
                          </div>
                          <!-- Link -->
                          <a href="#your-link" class="full-link"></a>
                        </div>
                
              </div>
            </div>
          <?php } }else{?>
             <h2>Record Not Available</h2>
         <?php } ?>
         
              
          </div>
        </div>
        </div>
      </section>



 


      </main>

<?php include 'footer.php';?>