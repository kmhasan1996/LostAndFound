<?php
// Start the session
include("connection.php");
error_reporting(0);
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lost&Found</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--<script src="js/bootstrap.js"></script>
    <script src="js/jquery.min.js"></script>-->
    <?php

    $userid=$_SESSION["userid1"];
    $firstname=$_SESSION["fname"];
    $lastname=$_SESSION["lname"];

    if ($_GET['submit']) {

        $type=$_GET['type'];
        $title=$_GET['title'];
        $description=$_GET['description'];
        $ldate=$_GET['ldate'];
        $location=$_GET['location'];
        $thana=$_GET['thana'];
        $district=$_GET['district'];
        $division=$_GET['division'];



        $query = "INSERT INTO `post` (`post_id`, `user_id`, `status`, `title`, `description`, `found_or_lost date`, `location`, `thana`, `district`, `division`) VALUES (NULL, '$userid', '$type', '$title', '$description', '$ldate', '$location', '$thana', '$district', '$division');";

        $data = mysqli_query($conn,$query);
        header("Location:userinfo.php");

    }
    //echo "$type $title $description $ldate $location $thana $district $division";
    ?>
</head>
<body  >

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Lost & Found</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="allpost.php">All Post</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo"$firstname $lastname"; ?></a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container" >
    <div class="row">
        <div class="col-lg-2 col-sm-2"></div>
        <div class="col-lg-8 col-sm-8">
            <div class="jumbotron">
                <form id="signupform" action="" method="GET" class="form-horizontal" role="form">

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">Post Type:</label>
                        <div class="col-md-9">
                            <select class="form-control" name="type" >
                                <option>Found</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-md-3 control-label">Title:</label>
                        <div class="col-md-9">
                            <select class="form-control" name="title">
                                <option>Select One</option>
                                <option>Passport</option>
                                <option>National Id</option>
                                <option>Driving Licence</option>

                            </select>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="description" class="col-md-3 control-label">Description:</label>
                        <div class="col-md-9">
                            <textarea type="text" class="form-control" name="description" value="" placeholder="Product description"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="dob" class="col-md-3 control-label">Found Date:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="ldate" value="" placeholder="Date">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="location" class="col-md-3 control-label">Location:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="location" value="" placeholder="Location">
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="thana" class="col-md-3 control-label">Thana:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="thana" value="" placeholder="Thana name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="district" class="col-md-3 control-label">District:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="district" value="" placeholder="District name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="division" class="col-md-3 control-label">Division:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="division" value="" placeholder="Division name">
                        </div>
                    </div>


                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">

                            <input type="submit" name="submit" value="Submit"/>
                        </div>
                    </div>




                </form>


            </div> <!-- jumbotron -->
        </div><!-- col-lg-8 col-sm-8 -->
        <div class="col-lg-2 col-sm-2"></div>
    </div> <!-- row -->
</div> <!-- container -->


</body>
</html>
