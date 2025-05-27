<?php include('header.php'); ?>
<?php  

if(isset($_REQUEST['editUser']))
{
     $password_name = trim($_REQUEST['password']);
     $password = md5($password_name);
      $id = trim($_REQUEST['id']);

$sql = "UPDATE tbl_users SET user_pwd='$password' WHERE user_id ='$id'";

if ($conn->query($sql) === TRUE) { ?>
     <script>
    window.top.location.href='profile.php?success=Update Successfully';
    </script>
  <?php } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 }
     ?>
<div class="row">
<div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../assets/img/user.jpg">
                </div>
                <br/>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Name</b> <a class="float-right"><?php echo $name = $_SESSION['user_name']; ?> </a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?php echo $name = $_SESSION['user_email']; ?></a>
                  </li>
                 
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <div class="col-md-7">
                <div class="card card-primary card-outline">
                   
                     <div class="card-body">
                  <?php if(isset($_REQUEST['success'])){ ?>  
                    <br/>
                  <div class="alert alert-success ">
                   <?php  echo "<h5 style='color:green;' align='center'; > ".$_REQUEST['success']."</h5>"; ?>    
                  </div>
                 <?php } ?> 
          <form action="profile.php" method="post" enctype="multipart/form-data" >
              <input type="hidden" name="id" value="<?php echo $user_id = $_SESSION['user_id']; ?>">
              
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Email</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" value="<?php echo $name = $_SESSION['user_email']; ?>" readonly="">
                    
                            </div>
                        </div>
                     <div class="form-group position-relative has-icon-left">
                            <label for="username">Password</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="password" >
                    
                            </div>
                        </div>

                        <div class="clearfix">
                            <button type="submit" name="editUser" class="btn btn-primary float-right">Change Password</button>
                        </div>
                    </form>
                    </div>
                    </div>
                    </div>
              </div>
              <?php include('footer.php'); ?>