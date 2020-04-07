<?php

session_start();
require "dbcon.php";

if(!isset($_SESSION['user'])){
    echo "YOU DON'T HAVE ACCESS TO THIS PAGE ";
    echo "<br> GO TO MAIN PAGE : <a href='menu.php'>Home Page</a>";
    echo "<br>GO TO LOGIN PAGE : <a href='login.html'>Login Page</a>";
}
else{
    if(isset($_POST['subm'])){
    // $r=$_SESSION['r'];
    // $u=$_SESSION['user'];
    // $v=$_SESSION['x'];
    // $a=$_POST['name'];
    // $b=$_POST['mob'];
    // $c=$_POST['email'];
    // $d=$_POST['work'];
    // $e=$_POST['about'];

    $u=$_SESSION['user'];
    $v=$_SESSION['x'];
    $a=$_POST['name'];
    $b=$_POST['addr'];
    $c=$_POST['dob'];
    $d=$_POST['email'];
    $e=$_POST['cont'];
    $f==$_POST['id'];
    $g=$_POST['pass'];
    $h=$_POST['status'];
    $i=$_POST['rno'];
    $j=$_POST['organization'];
    $k=$_POST['cp'];
    $l=$_POST['degree'];
    $m=$_POST['cag'];
    $n=$_POST['work'];
    $o=$_POST['work2'];


   if($v==1){
       if($n=='select'){
           echo "<script> alert('Please select first') </script>";
           header("Refresh:0.05;url=editprofile.php");
       }
       else{
        mysqli_query($db,"UPDATE alumni SET  name =$a, address =$b, dob =$c, email =$d, mobile =$e, alumni_id =$f, password =$g, rno =$h, passYr =$i, org =$j, crPos =$k, higherDegree =$l, courseAftGrad =$m, area =$n, natureOfProject =$o WHERE alumni_id =$f");
        echo "<script> alert('Updated Successfully') </script>";
        header("Refresh:0.05;url=editprofile.php");
       }
   }
   else{
    //    //$f=$_POST['college'];
    //    $g=$_POST['rno'];
    //    $h=$_POST['year'];
       if($n=='select'||$o=='select'||$j=='select'){
        echo "<script> alert('Please select first') </script>";
        header("Refresh:0.05;url=editprofile.php");
       }
       else{
           $sql="SELECT * from alumni where rno='$i'and '$i'!='$r' ";
           $rec=mysqli_query($db,$sql);
           if(mysqli_num_rows($rec)==0){
        mysqli_query($db,"UPDATE alumni SET  name =$a, address =$b, dob =$c, email =$d, mobile =$e, alumni_id =$o, password =$f, rno =$g, passYr =$h, org =$i, crPos =$j, higherDegree =$k, courseAftGrad =$l, area =$m, natureOfProject =$n WHERE alumni_id =$f");
        echo "<script> alert('Updated Successfully') </script>";
        header("Refresh:0.05;url=editprofile.php");
           }
           else{
            echo "<script> alert('Roll number exists!!Please Check..') </script>";
            header("Refresh:0.05;url=editprofile.php");
           }
       }
   }
}     
}
?>