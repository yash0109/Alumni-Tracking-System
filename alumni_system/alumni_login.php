<?php
session_start();
require "dbcon.php";
if(isset($_POST['login'])){
  $a=$_POST['user'];
  $b=$_POST['password'];
  //$c=md5($b);

  $sql="SELECT * FROM alumni where alumni_id = '$a' and password = '$b' ";

  $r=mysqli_query($db,$sql);
 
  if(mysqli_num_rows($r)){
       $_SESSION['user']=$a;
      header("location: main.php");
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
        <link rel="stylesheet" href="alumni_login.css">
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
            <div id="login">
                     
                <form action="alumni_login.php" method="POST">
                    <b>USER ID</b><br>
                    <input type="text" name="user" placeholder="registered user id" required><br><br>
                    <b>PASSWORD</b><br>
                    <input type="password" name="password" placeholder="PASSWORD" id="pass" required><br>
                    <input type="checkbox" onclick="myFunction()" style="margin-bottom:15px">Show Password<br><br>
                    <input type="submit" name="login" value="LOGIN"><br>
                    <a href="forgot.php">FORGOT PASSWORD ?</a><br>
                    <p>If you are new user than click the under button signup</p>
                    <button onclick="window.location.href='signup.php'">SIGN UP</button>
                </form>
            </div>
        
    </body>
</html>