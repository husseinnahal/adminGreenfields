<?php
include ('../include/db.php');
 include ('../include/postproducts.php');

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

<h1>Post a product</h1>

<form   action="postproducts.php" method="Post" class="inputs"  enctype="multipart/form-data">

<label for="name">Product name</label>
 <input type="text" id="name" name="name" placeholder="Enter your product name "  class="information"  value="<?php echo $productName?>" autocomplete="false">
 
<label for="desc">Description</label>
 <input type="text"  id="desc" name="description" placeholder="Enter a description of your product"  class="information"  value="<?php echo $description?>" autocomplete="off">
 
<label for="price">Price</label>
 <input type="number" id="price" name="price" placeholder="Set the price"  class="information"  value="<?php echo $price?>" autocomplete="off">
 
<label for="img">Image</label>
<input type="file" id="image" name="image" class="information"   autocomplete="off">

<label for="cat">Catergory</label>
<select id="cat" name="cat"  class="information" value="<?php echo $cat?>" >

<?php foreach($getcat as $gett):?>
    <option style=" background:#002204;color: #F9ECD0;font-size: 17px;" value="<?php echo $gett['id'] ?>"><?php echo $gett['name'] ?></option>
    <?php endforeach?> 
</select>

<p class="error"> <?php echo $error ?></p>

<input type="submit" name="submit" class="send" value="send"/> 
</form>


</body>
</html>