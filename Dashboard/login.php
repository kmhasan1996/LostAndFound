<?php
// Start the session
session_start();
include("connection.php");
error_reporting(0);
//include("Navbar.php");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Panel</title>

        <!-- Bootstrap core CSS -->


        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->

    </head>

<body>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>

                </div>

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" action="" method="GET" class="form-horizontal" role="form">

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Enter Email Address">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Enter Password">
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <!-- <a id="btn-login" href="#" class="btn btn-success">Login  </a>-->
                                <input type="submit" name="submit" value="Login"/>

                            </div>
                        </div>
                        <?php

                        $query ="SELECT * FROM admin";
                        $data = mysqli_query($conn,$query);
                        $total=mysqli_num_rows($data);


                        if($_GET['submit']){
                            if($total != 0){
                                $sum=1;
                                $email=$_GET['email'];
                                $pass=$_GET['password'];
                                //echo"$email $pass";
                                while ( $result = mysqli_fetch_assoc($data)) {

                                    if($email==$result['email'] && $pass==$result['password']){
                                        //echo "login successful";
                                        $sum=0;
                                        $_SESSION["email"] = $result['email'];

                                        header("Location: index.php");
                                    }



                                }
                                if($sum==1){

                                    ?>
                                    <script>alert("Login Failed");</script>
                                    <?php

                                }
                            }
                            else {
                                echo "No record found";
                            }
                        }
                        ?>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account!
                                    <a href="signup.php" >
                                        Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>