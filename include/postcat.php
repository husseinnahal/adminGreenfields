<?php
include ('db.php');



$catname=  "";
$image=  ""; 

$error=  ""; 


if(isset($_POST['submit'])){ 
    $catname=    $_POST['name'];
    $image=   $_POST['image']; 

    
    if(empty($catname) || empty($image)   ){
   $error="All fields are required";

    }
else{
 $sql="INSERT INTO categories(name,image) VALUES ('$catname','$image')";
mysqli_query($conn,$sql);
header("location: dashbord.php");
}
}


?>