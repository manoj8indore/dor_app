<?php
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
?>
  <script>
    window.top.location.href='index.php';
    </script>
?>