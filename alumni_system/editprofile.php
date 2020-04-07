<?php

session_start();
require "dbcon.php";

if(!isset($_SESSION['user'])){
    echo "YOU DON'T HAVE ACCESS TO THIS PAGE ";
    echo "<br> GO TO MAIN PAGE : <a href='index.php'>Home Page</a>";
    echo "<br>GO TO LOGIN PAGE : <a href='login.html'>Login Page</a>";
}
else{
    ?>

<!DOCTYPE html>
<html>
<head>
<title>EDIT PROFILE</title>
<style>
    #c{
        text-align: center;
    }
    img{
        padding: 30px;
        float: right;
        height: 75px;
        border-radius:50%;
    }
    .er{
    float: right;
}
    input[type=button],button{
    border-radius: 5px;
    width: 150px;
    background-color: darkgreen;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    cursor: pointer;
    opacity: 0.9;
}
input[type=submit],button{
    border-radius: 5px;
    width: 80px;
    background-color: darkgreen;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    cursor: pointer;
    opacity: 0.9;
}
.akg{
    float:left;
    padding: 20px;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    animation-delay: 2s;
    animation-iteration-count: 1;
}
.bv{
    background-image: url("image1.jpeg");
    background-size: cover;
    width: 100%;
    height: 220vh;
}
.kk{
    position: absolute;
    top: 20%;
    left: 30%;
    background: white;
    opacity: 0.8;
    width: 600px;
    height: auto;
    border-radius: 10%;
}
</style>
<link rel="stylesheet" href="css/animate.css">
</head>
<body>
    <div class="bv">
<div class="er">
                <input type="button" value="BACK" onclick="window.location.href='main.php' ;" >
                    </div>
                    <a href="https://www.sbjit.edu.in/"><img class='akg wow flip' title="Affiliated to RTM Nagpur University" src="https://2.bp.blogspot.com/-Dp4pXZ8-hE4/WuPORh6aYmI/AAAAAAAAa9k/ygEESfqjdwYNegxtwxvXoiCJwknn5PJRQCLcBGAs/s1600/SB%2BJain.png"></a>
    <div class="kk">
    <?php
    $a=$_SESSION['user'];
    $res=mysqli_query($db,"SELECT * from alumni where alumni_id='$a' ");
    if(mysqli_num_rows($res)){
        $rec=mysqli_fetch_array($res);
        $_SESSION['x']=$rec['verified'];
        $_SESSION['name']=$rec['name'];
         echo "<br><br>";
    ?>
        <h2 align='center'> <?php echo $a.' Edit Profile Here'; ?></h2>
        <div id="c">
         <form action='editprofile1.php' method="POST">
    <?php
         if($rec['verified']!='1'){
            
    ?>               
    </select><br><br>

    <b>NAME:</b><br>
    <input type="text" name="name" value="<?php echo $rec['name']; ?>"><br><br><br>
    <b>ADDRESS:</b><br>
    <input type="text" name="addr" value="<?php echo $rec['address']; ?>"><br><br><br>
    <b>DOB:</b><br>
    <input type="text" name="dob" value="<?php echo $rec['dob']; ?>"><br><br><br>
    <b>EMAIL:</b><br>
    <input type="email" name="email" value="<?php echo $rec['email']; ?>"><br><br><br>
    <b>CONTACT:</b><br>
    <input type="text" name="mob" value="<?php echo $rec['mobile']; ?>"><br><br><br>
    <b>USER ID:</b><br>
    <input type="text" name="id" value="<?php echo $rec['alumni_id']; ?>"><br><br><br>
    <b>PASSWORD:</b><br>
    <input type="password" name="pass" value="<?php echo $rec['password']; ?>"><br><br><br>
    <b>Maritial Status:</b>  
                <select name="status">
                    <option value="select">--SELECT--</option>
                    <option value="Married">Married</option>
                    <option value="Unmarried">Unmarried</option>
                </select><br><br><br>
    <?php
         }
    ?>

    <b>ROLL NUMBER:</b><br>
    <input type="text" name="rno" value= "<?php echo $rec['rno']; ?>" ><br><br>
    <b>Passing year:</b><br>
        <select name="year">
            <option value="select">--SELECT--</option>
            <script>
            var myDate = new Date();
            var year = myDate.getFullYear();
            for(var i = 2001; i < year+4; i++){
	        document.write('<option value="'+i+'">'+i+'</option>');
             }
            </script>
            </select><br><br>
    <b>ORGANIZATION:</b><br>
    <input type="text" name="organization" value="<?php echo $rec['org']; ?>"><br><br><br>
    <b>Current Position:</b><br>
    <input type="text" name="cp" value="<?php echo $rec['crPos']; ?>"><br><br><br>
    <b>Higher Degree:</b>
        <select name="degree">
            <option value="select">--SELECT--</option>
            <option value="M.E/M.Tech/M.S">M.E/M.Tech/M.S</option>
            <option value="MBA">MBA</option>
            <option value="Other">Other</option>
            <option value="NA">NA</option>
        </select><br><br><br>
    <b>Any Course After Graduation:</b>
    <input type="radio" name="cag" value="yes">Yes
    <input type="radio" name="cag" value="no">NO<br><br><br>
    <b>In which area do you work?</b>
        <select name="work">
            <option value="select">--SELECT--</option>
            <option value="Networking">Networking</option>
            <option value="Education">Education</option>
            <option value="Developer">Developer</option>
            <option value="Instrumentation">Instrumentation</option>
            <option value="IT">IT</option>
            <option value="Entrepreneur">Entrepreneur</option>
            <option value="Corporate">Corporate</option>
            <option value="Project Manager">Project Manager</option>
            <option value="Design">Design</option>
            <option value="Banking">Banking</option>
            <option value="Other">Other</option>
        </select><br><br><br>
    <b>What is the nature of projects you have handled after your graduation(either in employment or individually)</b>
        <select name="work2">
            <option value="select">--SELECT--</option>
            <option value="Goverment Sponsored">Goverment Sponsored</option>
            <option value="Collaboration/Research">Collaboration/Research</option>
            <option value="Testing">Testing</option>
            <option value="Application Development">Application Development</option>
            <option value="Information Security">Information Security</option>
            <option value="Developer">Developer</option>
            <option value="Other">Other</option>
        </select><br><br><br>
         <br><input type="submit" value="SAVE" name="subm">
        </form>
        </div>
        </div>
    <?php 
        }
    }
    
    ?>
    </div>
<script src="js/wow.min.js"></script>
        <script>
        new WOW().init();
        </script>
</body>
</html>

