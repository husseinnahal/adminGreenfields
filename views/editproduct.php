<?php
include ('../include/db.php');
$id = (int)$_GET['id'] ;


$values="SELECT *  FROM `products` WHERE id=$id";
$result=mysqli_query($conn,$values);
$gett=mysqli_fetch_assoc($result);


$cat='SELECT * FROM categories';
$result=mysqli_query($conn,$cat);
$getcat=mysqli_fetch_all($result,MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editproduct</title>
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
<h1>Update product</h1>

<form   action="../include/editproduct.php" method="Post" class="inputs" enctype="multipart/form-data">
    <?php echo '<input type="hidden" value="' . $id . '" name="id">';?>


<label for="name">Product name</label>
 <input type="text" id="name" name="name" placeholder="Enter your product name "  class="information"  value="<?php echo $gett['name']?>" autocomplete="false">
 
<label for="desc">Description</label>
 <input type="text" id="desc" name="description" placeholder="Enter a description of your product"  class="information"  value="<?php echo $gett['description']?>" autocomplete="off">
 
<label for="price">Price</label>
 <input type="number" id="price" name="price" placeholder="Set the price"  class="information"  value="<?php echo $gett['price']?>" autocomplete="off">
 
<label for="img">Image</label>
<input type="file" id="img" name="image" class="information"  value="<?php echo $gett['image']?>" autocomplete="off">

<label for="cat">Catergory</label>
<select id="cat" name="cat"  class="information" value="<?php echo $cat?>" >

<?php foreach($getcat as $gett):?>
    <option style=" background:#002204;color: #F9ECD0;" value="<?php echo $gett['id'] ?>"><?php echo $gett['name'] ?></option>
    <?php endforeach?> 
</select>


<button class="send">Update</button>

</form>

</div> 


</body>
</html>