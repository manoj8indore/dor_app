<?php error_reporting(1);define('MYSQL_DATE',date('Y-m-d'));
$dd= date('Y-m-d H:i:s');

 $np= date('Y-m-d',(strtotime ( '+14 hour' , strtotime ( $dd) ) ));
define('MYSQL_DATE_TIME',$np);
  
$servername = "localhost";
$database = 'qdhoyrlz_emporium';
$username = "qdhoyrlz_emporium";
$password = "emporium*123";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>