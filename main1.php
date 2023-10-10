<?php
session_start();
include 'connect (1).php';
if(empty($_SESSION['username']))
{
    header('location:test.php');
}
?>
<html>
    <head>
        <title>
            frontend1
        </title>
        <link rel="stylesheet" href="mystyle1.css">
    </head>
    <body>
<div class="main">
<nav>
    <img src="logo1.jpeg.jpg" height=100px, width=100px class="logo">
    <h1 style="color:#fff;
    font-size:70px;
               padding-right:800px; ">e-verifico</h1>
    <ul>
        <li><a href="div_sections.html" class="button button1">Home</a></li>
        <li><a href="vehicle1.php" class="button button1">Vehicle Number</a></li>
    </ul>
</nav>
<video autoplay loop muted plays-inline class="backvideo">
    <source src="hackv3.mp4" type="video/mp4">

</video>
</div>
    </body>
</html>