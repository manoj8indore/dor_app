<?php
$host="localhost";
$user="qdhoyrlz_device_api";
$pass="Device*123";
$db="qdhoyrlz_device_api";
$koneksi=mysqli_connect($host,$user,$pass);
mysqli_select_db($koneksi,$db);
if($koneksi){ //echo "success";
}else{ echo "failed to connect"; }
$temp1 = $_GET['Cvalue'];
if($temp1){
$temp = explode('*', $temp1);
$deviceserial = $temp[0];
$q2 = "INSERT INTO `Device` (`status`)VALUES ('$deviceserial')";
$run2 = mysqli_query($koneksi, $q2);
if ($run2){  
$file = fopen("postvalue.json", "w") or die("can't open file");
 fwrite($file, '{"status": "'.$deviceserial.'"}');
 fclose($file);
echo "This Value Has Been Inserted Successfully"; }
else { echo "Values Not Inserted Successfully ";}
 }else{ echo " CValue Not Get";  }




?>