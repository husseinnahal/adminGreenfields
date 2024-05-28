<?php
session_start();
if(!isset($_SESSION["user_info"])){
    header("Location: login.php");
}
include ('../include/db.php');

$cat='SELECT * FROM categories';
$result=mysqli_query($conn,$cat);
$getcat=mysqli_fetch_all($result,MYSQLI_ASSOC);


$product='SELECT products.id, products.name, products.description, products.price, products.image, categories.name AS category_name 
FROM products
INNER JOIN categories ON products.category_id = categories.id';
$result=mysqli_query($conn,$product);
$getpro=mysqli_fetch_all($result,MYSQLI_ASSOC);



if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    $sql = "DELETE From categories WHERE id = $idToDelete";
    mysqli_query($conn, $sql);
    header("location: dashbord.php");
}

if (isset($_GET['deletee'])) {
    $idToDelete = $_GET['deletee'];
    $sql = "DELETE From products WHERE id = $idToDelete";
    mysqli_query($conn, $sql);
    header("location: dashbord.php");
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashbord</title>
    <link rel="stylesheet" href="style.css">
<style>
body{
    background:#57704f;
 color: #F9ECD0;
 margin:0px;
}
.partitle{
    text-align:center;
    border-bottom:2px solid black;
}
div{
    margin-top:40px ;
    margin-bottom:70px ;

}
table{
    width:100%;
    th{
    text-align:center;
  width:30%;
  font-size:25px;
  border-left:2px solid black;
  border-bottom:2px solid black;
padding:10px;
    }
    td{
    text-align:center;
  width:30%;
  border-left:2px solid black;
  border-bottom:2px solid black;
padding:10px;
.img{
    width:75px;
height: 55px;
margin:0 auto ;
}
}
    }

    .butons{
        width:10%;
  border-left:2px solid black;
  border-bottom:2px solid black;
padding:5px;


.delete{
    border:none;
    border-radius: 50%;
    background-color:red;
    padding: 9px;
}
.edit{
padding:8px;
    border-radius: 50%;
    background-color:blue;
    border:none;
margin-right:4px;
}
    }


.products{
    width:100%;
    th{
    text-align:center;
  width:15%;
  font-size:25px;
  border-left:2px solid black;
  border-bottom:2px solid black;
    }
    td{
    text-align:center;
  width:15%;
  border-left:2px solid black;
  border-bottom:2px solid black;
padding:10px;
.img{
width:66px;
height: 60px;
margin:0 auto ;
}
    }
    .butons{
        width:10%;
  border-left:2px solid black;
  border-bottom:2px solid black;
padding:5px;

.delete{
    border:none;
    border-radius: 50%;
    background-color:red;
    padding: 9px;
}
.edit{
    margin-right:3px;
padding:8px;
    border-radius: 50%;
    background-color:blue;
    border:none

}
    }
}


    </style>
</head>

<body>
<?php  require("header.php")  ?>
<div>
<h1 class="partitle">Your Categories</h1>

<table>
    <tr>
<th>ID</th>
<th>NAME</th>
<th>Image</th>
    </tr>
 <?php foreach($getcat as $gett):?>
    <tr>
<td><?php echo $gett['id'] ?></td>
<td><?php echo $gett['name'] ?></td>
<td>
<div class="img" style="background-image: url('<?php echo $gett['image'] ?>');
 background-repeat: no-repeat; background-size: cover;    background-position: center;" > 
 </div>
</td>

<td class="butons">

    <a href='editcat.php?id=<?php echo  $gett['id'] ?>' class='edit'>
    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="15" viewBox="0 0 512 512"><path fill="#b3bac6" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
 </a>

    <a href='?delete=<?php echo $gett['id'] ?> ' class="delete">
    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="15" viewBox="0 0 448 512"><path fill="#d6d8ca" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
    </a>
    
</td> 

    </tr>
<?php endforeach?> 

</table>
 </div>
  


<div>
<h1 class="partitle">Your Products</h1>

<table class="products">
    <tr>
<th>ID</th>
<th>NAME</th>
<th>DESCRIPTION</th>
<th>PRICE</th>
<th>Image</th>
<th>CATEGORY</th>
    </tr>
 <?php foreach($getpro as $get):?>

    <tr>
<td><?php echo $get['id'] ?></td>
<td><?php echo $get['name'] ?></td>
<td><?php echo $get['description'] ?></td>
<td><?php echo $get['price'] ?>$</td>
<td>
<div class="img" style="background-image: url('<?php echo $get['image'] ?>');
 background-repeat: no-repeat;background-size: 100% 100%;" > 
 </div>
</td>

<td><?php echo $get['category_name']?></td>

<td class="butons">
<a href='editproduct.php?id=<?php echo  $get['id'] ?>' class='edit'>
    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="15" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#b3bac6" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
 </a>
    <a href='?deletee=<?php echo $get['id'] ?> ' class="delete">
    <svg xmlns="http://www.w3.org/2000/svg" height="18" width="15" viewBox="0 0 448 512"><path fill="#d6d8ca" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
    </a>
</td> 
</tr>
<?php endforeach?> 

</table>
 </div>




</body>
</html>