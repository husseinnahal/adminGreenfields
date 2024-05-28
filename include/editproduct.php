<?php
include('db.php');

$id = $_POST['id'] ;





$error=  ""; 

    $productname=    $_POST['name'];
    $description=   $_POST['description']; 
    $price=   $_POST['price']; 
    $cat=   $_POST['cat']; 

    if(empty($productname) || empty($description) || empty($price) || empty($_FILES['image']['name']) || empty($cat)   ){
        $error="All fields are required";
     
         }

         else {
            // File upload handling
                $path = "../img/";
                $targetFile = $path . basename($_FILES["image"]["name"]);
                $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        
                // Check if file is an actual image
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        $image = $targetFile;
                        
                        // Prepare an SQL statement
                        $stmt = $conn->prepare("UPDATE `products` SET name=?,description=?,price=?,image=?,category_id=? WHERE id=$id ");
                        $stmt->bind_param("ssisi", $productname, $description, $price, $image, $cat);
                        
                        if ($stmt->execute()) {
                            header("location: /adminmashtal/views/dashbord.php");
                        }                 
                        $stmt->close();
                    } 
                } 
            }









?>