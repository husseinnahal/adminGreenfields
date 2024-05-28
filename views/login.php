<?php
include ('../include/db.php');
 include ('../include/login.php')
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>login</title>
 <style>
 
 body{
     background:#57704f;
 color: #F9ECD0;
 margin:0px;
 }
 
 
 .login{
 display: flex;
 justify-content:space-between;
 align-items: center;
 z-index: -1;
 .log{
 
     display: flex;
     flex-direction: column;
     gap: 20px;
     margin-left: 290px;
     width: 450px;
 h1{
     text-align: center;
     font-size: 42px;}
 
 }
 
 .inputs{    
     display: flex;
     flex-direction: column;
     gap: 15px;
 
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
 
     .errors{
     display: flex;
     align-items: center;
     justify-content: space-between;
     .error{
         color: #dd0404;
       font-size: 17px;
     }
     .succ{
         color: #002204;
       font-size: 17px;
     }
     p{margin:8px 0}
 }
 }
 
 }
 
 
 </style>
 
 </head>
 <body> 
 <div class="login">
 <div class="log">
     <h1>Welcome back!</h1>
     <p>Lorem ipsum dolor sit adipisicing elit. Minus deleniti deserunt quod voluptatibus ab.</p>
 <form   action="login.php" method="Post" class="inputs">
 
     <label for="name"> User name</label>
 <input type="text" id="name" name="name" placeholder="Enter your user name "  class="information"  value="<?php echo $username?>" autocomplete="off">
 
 <label>Password</label>
 <input type="password" name="password" placeholder="Enter your password" class="information" value="<?php echo $pass?>" autocomplete="off">
 
 <div class="errors">
     <p class="succ"> <?php echo $succ ?></p>
     <p class="error"> <?php echo $error ?></p>
 </div>
 
 
 <input type="submit" name="submit" class="send" value="send"/> 
 
 </form>
 
 
 </div>
 
 
 
 
 <img src="../img/register.png" alt="back" width="600" height="740">
 
 </div>
 
 </body>
 </html>