<?php
include ('db.php');



$productname=  "";
$description=  ""; 
$price=  ""; 
$image=  ""; 
$cat=  ""; 

$error=  ""; 


if(isset($_POST['submit'])){ 
    $productname=    $_POST['name'];
    $description=   $_POST['description']; 
    $price=   $_POST['price']; 
    $image=   $_POST['image']; 
    $cat=   $_POST['cat']; 

    
    if(empty($productname) || empty($description) || empty($price) || empty($image) || empty($cat)   ){
   $error="All fields are required";

    }
else{
 $sql="INSERT INTO products(name,description,price,image,category_id) VALUES ('$productname','$description','$price','$image','$cat')";
mysqli_query($conn,$sql);
header("location: dashbord.php");
}
}


?>