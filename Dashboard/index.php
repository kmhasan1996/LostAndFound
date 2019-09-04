<?php
    include("Navbar.php");
    include("connection.php");
    error_reporting(0);

?>

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" >
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title" style="text-align: center;font-weight: bold;">Total No. of Users</div>

                </div>

                <div style="padding-top:30px" class="panel-body" >
                    <?php
                    $query1 ="SELECT * FROM userinfo";
                    $data1 = mysqli_query($conn,$query1);
                    $result = mysqli_num_rows($data1);

                    ?>
                    <h1 style="text-align: center;font-size: 50px;"><?php echo $result; ?></h1>
                </div>
            </div>
        </div>
    </div>
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="loginbox" style="margin-top:50px;" >
                    <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title" style="text-align: center; font-weight: bold;">Total No. of Lost Item Post</div>

                        </div>

                        <div style="padding-top:30px" class="panel-body" >
                            <?php
                            $query1 ="SELECT * FROM post where status='Lost'";
                            $data1 = mysqli_query($conn,$query1);
                            $result = mysqli_num_rows($data1);

                            ?>
                            <h1 style="text-align: center;font-size: 50px;"><?php echo $result; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="loginbox" style="margin-top:50px;" >
                    <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title" style="text-align: center;font-weight: bold;">Total No. of Found Item Post</div>

                        </div>

                        <div style="padding-top:30px" class="panel-body" >
                            <?php
                            $query1 ="SELECT * FROM post where status='Found'";
                            $data1 = mysqli_query($conn,$query1);
                            $result = mysqli_num_rows($data1);

                            ?>
                            <h1 style="text-align: center;font-size: 50px;"><?php echo $result; ?></h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

<?php
    include ("Footer.php");
?>