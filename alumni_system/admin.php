<?php
session_start();
require "dbcon.php";
if(isset($_POST['login'])){
  $a=$_POST['user'];
  $b=$_POST['password'];
  //$c=md5($b);

  $sql="SELECT * FROM admin where id = '$a' and password = '$b' ";

  $r=mysqli_query($db,$sql);
 
  if(mysqli_num_rows($r)){
       $_SESSION['user']=$a;
      header("location: main2.php");
  }
  else{
      echo"<script> alert('INCORRECT CREDENTIALS') </script>";
  }
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN PAGE</title>
        <link rel="stylesheet"  type="text/css" href="design.css">
        <script>
            function myFunction() {
              var x = document.getElementById("pass");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
            </script>
    </head>
    <body>
        <div class="back">
               <h1>Login Here</h1>
                <form action="admin.php" method="POST">
                    <p><b>ADMIN ID</b></p><br>
                    <input type="text" name="user" placeholder="registered admin id" required><br><br>
                    <p></p><b>PASSWORD</b></p>  <br>
                    <input type="password" name="password" placeholder="PASSWORD" id="pass" required>
                    <table>
                    <tr>
                    <td><input type="checkbox" onclick="myFunction()"></td>
                    <td><p style="color:white;">Show Password</p></td></tr></table><br><br>
                    <input type="submit" name="login" value="LOGIN"><br>
                </form>
        </div>
    </body>
</html>