<?php require_once('config.php');  
// sql to delete a record

$id = $_GET['id'];
$sql = "DELETE FROM tbl_project WHERE product_id='$id'";
if ($conn->query($sql) === TRUE) {
?>
     <script>
    window.top.location.href='collection_list.php?success=Record deleted successfully';
    </script>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>