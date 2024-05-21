<?php
include ('../include/db.php');
 include ('../include/postcat.php')
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post</title>
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

<h1>Post a category</h1>

<form   action="category.php" method="Post" class="inputs">

<label for="name">Product name</label>
 <input type="text" id="name" name="name" placeholder="Enter your product name "  class="information"  value="<?php echo $catname?>" autocomplete="off">
 
<label for="img">Image</label>
<input type="file" id="img" name="image" class="information"  value="<?php echo $image?>" autocomplete="off">

<p class="error"> <?php echo $error ?></p>

<input type="submit" name="submit" class="send" value="send"/> 
</form>


</body>
</html>