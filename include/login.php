<?php
include('db.php');

$username=  ""; 
$pass=  ""; 

$error=  ""; 
$succ=  ""; 



if(isset($_POST['submit'])){  

$username=  $_POST['name'] ;
$pass= $_POST['password'];




$query = "SELECT * FROM `register` WHERE name='$username' AND password= '$pass' AND isAdmin=1  ";


if(empty($username) || empty($pass)   ){
    $error="All fields are required";
     }

else {
    
if (mysqli_query($conn,$query)) {
    session_start();

    $result=mysqli_query($conn,$query);

    $data = mysqli_fetch_assoc($result);
    $_SESSION["user_info"]=$data;
    
    if (mysqli_num_rows($result)==0) {
       $error="Sorry, you are not the admin";
    }else{header("location: dashbord.php");}
 
}
}
}

?>