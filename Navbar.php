<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lost&Found</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--<script src="js/bootstrap.js"></script>
  <script src="js/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<?php

include("connection.php");
error_reporting(0);
session_start();

?>

<body>

<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Lost & Found</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="allpost.php">All Post</a></li>
        <li>


        </li>
      
        
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <?php
        $userid = $_SESSION["userid"];
        $fname = $_SESSION["fname"];
        $lname = $_SESSION["lname"];
            if($userid == "" && $fname == ""){
                ?>
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php
            }else
            {
                ?>
                <li><a href="userinfo.php"><span class="glyphicon glyphicon-user"></span> <?php echo $fname." ".$lname?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

                <?php
            }
        ?>

    </ul>
  </div>
</nav>
