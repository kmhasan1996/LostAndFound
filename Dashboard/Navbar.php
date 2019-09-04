<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel</title>

  <!-- Bootstrap core CSS -->

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Welcome Admin </div>
      <div class="list-group list-group-flush">
      <a href="index.php" class="list-group-item list-group-item-action bg-light">Home</a>
        <a href="userList.php" class="list-group-item list-group-item-action bg-light">Users</a>
        <a href="NewCategory.php" class="list-group-item list-group-item-action bg-light">Category</a>
        <a href="NewCity.php" class="list-group-item list-group-item-action bg-light">City</a>
        <a href="NewArea.php" class="list-group-item list-group-item-action bg-light">New Area</a>
        
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <?php
                    session_start();
                    error_reporting(0);
                    $email = $_SESSION['email'];
                    if($email == ""){
                        header("Location:login.php");
                    }

                    if($email != ""){
                        ?>
                            <li class="nav-item">
                                 <a class="nav-link" href="#"><?php echo $email;?> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout </a>
                            </li>


                        <?php
                    }else{
                        ?>
                            <a class="nav-link" href="logout.php">Logout </a>
                        <?php
                    }
                ?>

            </li>
            
          </ul>
        </div>
      </nav>


<?php
//include ("Navbar.php");
?>


<?php
//include ("Footer.php");
?>