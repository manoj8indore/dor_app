    <!-- Custom made script for this project-->
    <script src="<?php echo base_url().'assets/js/script.js' ?>"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url().'assets/vendor/jquery/jquery.min.js' ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="<?php echo base_url().'assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url().'assets/vendor/jquery-easing/jquery.easing.min.js' ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url().'assets/js/sb-admin-2.min.js' ?>"></script>

    <!-- Page level plugins for Tables-->
    <script src="<?php echo base_url().'assets/vendor/datatables/jquery.dataTables.min.js' ?>"></script>
    <script src="<?php echo base_url().'assets/vendor/datatables/dataTables.bootstrap4.min.js' ?>"></script>

    <!-- Page level custom scripts for Tables  remote: {
                        url: "<?php //echo base_url('User/User/check_rsid'); ?>",
                        type: "post"
                     }-->
    <script src="<?php echo base_url().'assets/js/demo/datatables-demo.js' ?>"></script>

     <script>
          $("#user_signup_form").validate({
            rules: {
                name: {
                    required: true,
                },
                mobile: {
                    required: true,
                },
                city: {
                    required: true,
                },
                address: {
                    required: true,
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Please Enter name",
                },
                mobile: "Please Enter Mobile Number",
                city: "Please Enter City",
                address: "Please Enter Address",
                email: "Please Enter Email",
                password: "Please Enter Password",
              
            }
        }
);

  
    </script>

</body>

</html>