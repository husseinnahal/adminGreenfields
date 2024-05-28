<?php
include('db.php');

$productName = "";
$description = "";
$price = "";
$image = "";
$cat = "";
$error = "";

if (isset($_POST['submit'])) {
    $productName = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];
    
    if (empty($productName) || empty($description) || empty($price) || empty($cat) || empty($_FILES['image']['name'])) {
        $error = "All fields are required";
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
                    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image, category_id) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("ssisi", $productName, $description, $price, $image, $cat);
                    
                    if ($stmt->execute()) {
                        header("location: dashbord.php");
                    }                 
                    $stmt->close();
                } 
            } 
        } 
    }


    $cat='SELECT * FROM categories';
    $result=mysqli_query($conn,$cat);
    $getcat=mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    
?>