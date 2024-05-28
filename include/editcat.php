<?php
include ('db.php');
$id = $_POST['id'] ;




 
    $catname=$_POST['name'];
    $error="";

    if(empty($catname) || empty($_FILES['image']['name'])  ){
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
                        $stmt = $conn->prepare("UPDATE categories SET name=? , image=? WHERE id=$id");
                        $stmt->bind_param("ss", $catname, $image); 
                        
                        
                        if ($stmt->execute()) {
                            header("location: /adminmashtal/views/dashbord.php");
                        }                    
                        $stmt->close();
                    } 
                } 
            } 



?>