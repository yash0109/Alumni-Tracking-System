<?php
$db=mysqli_connect("localhost","root","","ATS");    //$variable = mysqli_connect("localhost","username","password","database");
 if(!$db)
   echo "<script> alert('Connection Failed') </script>";  
?>
