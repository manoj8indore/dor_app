
<?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == "error") {
            echo "<div class='alert alert-danger'>Something went wrong... Please try again.</div>";
        } else if ($_GET['msg'] == "val_er") {
            echo "<div class='alert alert-danger'>Please enter category name.</div>";
        }
    }
?>

            <div data-backdrop="static" tabindex="-1" aria-labelledby="formAddKaryawan" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary mx-3 mt-3" id="formAddKaryawanLabel">Select Vehicle and Download the Apk</h5>
                           
                        </div>
                        <form name="form_add_mahasiswa" action="<?php echo base_url().'save_category' ?>" method="post" class="user needs-validation mx-3 mb-4" novalidate>
                            <div class="modal-body"> 
                            
                               
                                <div class="form-group">
                                    <!-- <label class="control-label text-primary">Select Vehicle</label> -->
                                   
                                     <select name="vehicle" id="vehicle" class="form-control mt-2" onchange="get_vehicle(this.value)">
									    <option value="">Select Vehicle</option>
									    <option value="0|all.apk.apk">All</option>
									    <?php foreach($record as $vehicle){ ?>
                                        <option value="<?php echo $vehicle->id."|".$vehicle->apk; ?>"><?php echo $vehicle->name; ?></option>
									   <?php }?>
									 </select> 
                                </div>
                         <div id="container"></div>
                           <!-- <div class="modal-footer d-flex">
                               <a type="button" class="flex-fill btn btn-danger btn-user" href="<?php echo base_url().'category' ?>">Cancel</a>
                                <button type="submit" class="flex-fill btn btn-success btn-user">Save</button>
                            </div> -->
                        </form>
                        <br>
                    </div>
                </div>
            </div>
            <script>
            	function get_vehicle(selectedValue){
            		var myArray = selectedValue.split('|');
            		myArray[1];
            		//var linkText = "Here";
			        var linkUrl = "<?php echo base_url() ?>"+"Admin/Textfile/download_apk?apk="+myArray[1]+"&id="+myArray[0];
			        var logUrl = "<?php echo base_url() ?>"+"vehicle";
			    
			      /*  var newLink = $('<a>', {
			            text: linkText,
			            href: linkUrl
			        });*/

			        var html = '<div class="alert alert-success"><strong>Success!</strong> Please Download the Apk <a href='+linkUrl+' class="alert-link">Here</a>.</div><div class="alert alert-dark"><strong>Directly</strong> access the Log File <a href='+logUrl+' class="alert-link">Here</a>.</div>';
                $('#container').html(html);
            	}
            </script>