<?php
include ('../include/db.php');
$id = (int)$_GET['id'] ;



$values="SELECT `name`, `image` FROM `categories` WHERE id=$id";
$result=mysqli_query($conn,$values);
$get= mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="style.css">
    <style>
body{
    background:#57704f;
 color: #F9ECD0;
 margin:0px;
}
h1{
     text-align: center;
     font-size: 42px;}
 
 .inputs{    
     display: flex;
     flex-direction: column;
     gap: 15px;
 width: 750px;
 margin:40px auto;
     label{
         font-size:23px;
     }
     .information{
         background: none;
     border: 2px solid black;
     border-radius: 30px;
     padding: 13px;
 color: #F9ECD0;
  
     }
 
     .send{
         background:#002204;
         color: #F9ECD0;
 
     width: 130px;
     border-radius: 30px;
     padding: 10px;
     margin: 0 auto;
     font-size:19px;
     border:none;
     cursor: pointer;
     }
     .information:focus{
 outline:none;
 
     }
 
     .error{
         color: #dd0404;
       font-size: 17px;
     }
 
 }


 </style>
</head>
<body>
<?php  require("header.php")  ?>

<div>
<h1>Update category</h1>

<form   action="../include/editcat.php" method="Post" class="inputs" enctype="multipart/form-data">
    
    <?php echo '<input type="hidden" value="' . $id . '" name="id">';?>

<label for="name">category name</label>
 <input type="text" id="name" name="name" placeholder="Enter your product name "  class="information"  value="<?php echo $get['name']?>" autocomplete="off">    
<label for="img">Image</label>
<input type="file" id="img" name="image" class="information"  value="<?php echo $get['image']?>" autocomplete="off">
<button class="send">Update</button>


</form>


</div>

</body>
</html>