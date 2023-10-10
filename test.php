<?php
session_start();
include 'connect (1).php';
if(isset($_POST['submit']))
{
    $username = $_POST['email'];
    $password = $_POST['pass'];
    echo "<script>alert('$username' '$password')</script>";
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form validation in HTML & CSS | CodingNepal</title>
        <link rel="stylesheet" href="stylephp.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    </head>
<body>
  <div class="wrapper">
    <header>Login Form</header>
    <form action="submit.php" method="POST">
       
    

          <input type="email" placeholder="Email Address" name="email" id="EmailAddress" style="margin:10px;width: 100%;
  height: 100%;font-size: 18px;" requried>

          <input type="password" placeholder="Password" name="pass" id="Password" style="margin:10px;width: 100%;
  height: 100%;font-size: 18px;" required>
          <br/>
          <br/>
        
          
<div class="pass-txt"><a href="#">Forgot password?</a></div>
<br/>
      <button type="submit" name="login">LOGIN</button>
    </form>
    <p>NOTE:Login only applicable for higher authoroties
  </div>
  <script src="script.js"></script>
</body>
</html>