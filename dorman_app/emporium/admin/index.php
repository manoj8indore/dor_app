<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<style type="text/css">
   .bg-gradient-primary{ background: #ff4b1f;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #ff9068, #ff4b1f);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #ff9068, #ff4b1f); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.btn-primary{
 background: #ff4b1f;
 border-color: #ff9068;   
}
.btn-primary:hover{
 background: #ff9068;
 border-color: #ff4b1f;   
}
</style>

<?php 

if(isset($_REQUEST['login']))
{
    
     $email_name = trim($_REQUEST['email']);
     $password = trim($_REQUEST['password']);
     $password1 = md5($password);
   /* echo "select * from tbl_users  where `user_email`='$email_name' and  `user_pwd`='$password1' AND user_status='0'";*/
    $sql = "select * from tbl_users  where `user_email`='$email_name' and  `user_pwd`='$password1' AND user_status='1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $_SESSION['user_id']=$row['user_id'];
     
    $_SESSION['user_name']=$row['user_name'];
    $_SESSION['user_email']=$row['user_email'];
    $_SESSION['user_type']=$row['user_type'];
    $_SESSION['user_status']=$row['user_status'];
    header("location:dashboard.php");
    } else
    {
    header("location:index.php?error=Invalid Username and Password");
    }
}

?>
  <!-- <script>
    window.top.location.href='inventory_list.php';
    </script> -->
    
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
          
            <div class="col-xl-5 col-lg-6 col-md-8">
                  <?php if(isset($_REQUEST['error'])){ ?>  
                    <br/>
                  <div class="alert alert-danger alert-error">
                <?php  echo "<h5 style='color:red;' align='center'; > ".$_REQUEST['error']."</h5>"; ?>    
                  </div>
              <?php } ?> 
                <br/><br/>
                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!--<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                                    </div>
                                    <form class="user"  action="index.php" method="post"    id="login" name="login" enctype="multipart/form-data" >
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                               name="email"
                                                placeholder="Enter Email Address..." required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                placeholder="Password" required="">
                                        </div>
                                      <input type="submit"  name="login"  value="Login" class="btn btn-primary btn-user btn-block">
                                       
                                    </form>
                                    <hr>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>

<?php include('footer.php'); ?>