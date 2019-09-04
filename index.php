<?php 
include("Navbar.php");
include("connection.php.php");


?>
<script>
    function categorySelectorForLost(str) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("categoryLost").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "CategorySelectorForLost.php?q=" + str, true);
        xmlhttp.send();
    }
    function categorySelectorForFound(str) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("categoryFound").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "CategorySelectorForFound.php?q=" + str, true);
        xmlhttp.send();
    }
</script>

<div class="container-fluid" style="background-image:url('image/landing_page.jpg');padding-top: 100px;padding-bottom: 100px;margin-top:-20px;">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6  col-sm-6">
                    <div class="jumbotron" style="opacity: 0.85;filter: alpha(opacity=30);background-color:black;color:white;">
                        <div class="row">
                            <div>
                                <div>
                                    <h4 class="text-justify" style="text-align: center;margin-top: -20px;">Have you <strong style="font-size: 50px;">Lost</strong> something ?</h4>
                                    <br>
                                    <?php
                                    $query1 ="SELECT * FROM post where status = 'Found'";
                                    $data1 = mysqli_query($conn,$query1);
                                    $result = mysqli_num_rows($data1);

                                    ?>
                                    <h5 class="text-justify"  style="text-align: center;">Search from <strong style="font-size: 20px;"><?php echo $result;?></strong> found Item</h5>
                                </div>
                            </div>

                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-4 ">Area: </label>
                                    <div class="col-lg-6 col-md-6">
                                        <select class="form-control" onchange="categorySelectorForLost(this.value)"  name="area">
                                            <option>Select One</option>
                                            <?php


                                            $query ="SELECT distinct (area) FROM post where status='Found'";
                                            $data = mysqli_query($conn,$query);
                                            $total=mysqli_num_rows($data);
                                            while ( $result = mysqli_fetch_assoc($data)){s
                                                ?>

                                                <option ><?php echo$result["area"]; ?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 ">Category:</label>
                                    <div class="col-lg-6 col-md-6">
                                        <select class="form-control" id="categoryLost" name="category" >
                                            <option>Select one</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <!-- Button -->
                                    <div class="col-md-offset-4 col-md-6">

                                        <input type="submit" name="subbmit" value="Search" style="color:black;"/>
                                    </div>
                                </div>

                            </form>
                            <?php

                            if ($_GET['subbmit']){
                                if ( $_GET['area']=='' ||$_GET['category']==''){
                                    //echo 'Please,select all option';
                                    echo "<script type='text/javascript'>alert('Please,select all option!ydt')</script>";
                                }
                                //echo $lf;
                                $area=$_GET['area'];
                                $category=$_GET['category'];

                                $query ="SELECT * FROM post where status='Found' and category='$category' and area='$area' ";


                                $data = mysqli_query($conn,$query);
                                $total=mysqli_num_rows($data);
                                if ($total != 0){
                                    while ( $result = mysqli_fetch_assoc($data)) {

                                    $idd=$result['user_id'];
                                    $image=$result['image'];
                                    $type=$result['status'];
                                    $title=$result['title'];
                                    $description=$result['description'];
                                    $lfdate=$result['found_or_lost_date'];
                                    $location=$result['location'];
                                    $area=$result['area'];
                                    $city=$result['city'];
                                    ?>
                                    <div class="jumbotron" style="margin-bottom: 6px ;margin-left: -10px;color: black ">
                                        <div class="row">
                                            <div class="col-xm-12  col-sm-12 col-md-12">
                                                <h3 style="font-weight: bold;text-align: center;margin-top: -30px;"> <?php echo"$type<br/>"; ?></h3>
                                                <?php
                                                echo "<img width='175' height='175' src='upload_images/".$image."' ><br/>";
                                                ?>
                                                <label style="font-weight: bold;">Title :</label> <?php echo"$title<br/>"; ?>
                                                <label style="font-weight: bold;"> Date:</label> <?php echo"$lfdate<br/>"; ?>

                                                <label style="font-weight: bold;">Location :</label> <?php echo $location .", ". $area .", ". $city."<br/>" ?>
                                                <label style="font-weight: bold;">Description :</label> <?php echo"$description<br/>"; ?>

                                                <?php
                                                $query11 ="SELECT * FROM userinfo";
                                                $data11 = mysqli_query($conn,$query11);
                                                //$userid=$_SESSION["userid"];
                                                while ( $result = mysqli_fetch_assoc($data11)) {
                                                    if($idd==$result['user_id']){
                                                        $firstname =$result['first_name'];
                                                        $lastname =$result['last_name'];
                                                        $password=$result['password'];
                                                        $email=$result['email'];
                                                        $mobno=$result['mobno'];
                                                        $fblink=$result['fb_link'];
                                                        $thana=$result['thana'];
                                                        $district=$result['district'];
                                                        $division=$result['division'];

                                                    }
                                                }
                                                $x++;
                                                ?>

                                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo<?php echo $x;?>">Contacts</button>
                                                <div id="demo<?php echo $x;?>" class="collapse">
                                                    <h5><?php echo"$firstname $lastname"; ?></h5>
                                                    <label style="font-weight: bold;"> Email:</label> <?php echo"$email<br/>"; ?>
                                                    <label style="font-weight: bold;"> Mobile:</label> <?php echo"$mobno<br/>"; ?>
                                                    <label style="font-weight: bold;"> Facebook profile:</label> <a href="<?php echo"$fblink"; ?> " >Click here</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php }

                            }
                            if ($total==0){
                                echo "<script type='text/javascript'>alert('Please,select Area and Category')</script>";
                            }

                            }

                            ?>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-6  col-sm-6">
                    <div class="jumbotron" style="opacity: 0.85;filter: alpha(opacity=30);background-color:black;color:white;">
                        <div class="row">
                            <div>
                                <div>
                                    <h4 class="text-justify" style="text-align: center;margin-top: -20px;" >Have you <strong style="font-size: 50px;">Found</strong> something ?</h4>
                                    <br>
                                    <?php
                                    $query1 ="SELECT * FROM post where status = 'Lost'";
                                    $data1 = mysqli_query($conn,$query1);
                                    $result = mysqli_num_rows($data1);

                                    ?>
                                    <h5 class="text-justify"  style="text-align: center;">Search from <strong style="font-size: 20px;"><?php echo $result;?></strong> lost Item</h5>
                                </div>
                            </div>

                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-4 ">Area: </label>
                                    <div class="col-lg-6 col-md-6">
                                        <select class="form-control" onchange="categorySelectorForFound(this.value)"  name="area">
                                            <option>Select One</option>
                                            <?php


                                            $query ="SELECT distinct (area) FROM post where status='Lost'";
                                            $data = mysqli_query($conn,$query);
                                            $total=mysqli_num_rows($data);
                                            while ( $result = mysqli_fetch_assoc($data)){s
                                                ?>

                                                <option ><?php echo$result["area"]; ?></option>

                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 ">Category:</label>
                                    <div class="col-lg-6 col-md-6">
                                        <select class="form-control" id="categoryFound" name="category" >
                                            <option>Select one</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <!-- Button -->
                                    <div class="col-md-offset-4 col-md-6">

                                        <input type="submit" name="subbmit1" value="Search" style="color:black;"/>
                                    </div>
                                </div>

                            </form>
                            <?php

                            if ($_GET['subbmit1']){
                                if ( $_GET['area']=='' ||$_GET['category']==''){
                                    //echo 'Please,select all option';
                                    echo "<script type='text/javascript'>alert('Please,select all option!ydt')</script>";
                                }
                                //echo $lf;
                                $area=$_GET['area'];
                                $category=$_GET['category'];

                                $query ="SELECT * FROM post where status='Lost' and category='$category' and area='$area' ";


                                $data = mysqli_query($conn,$query);
                                $total1=mysqli_num_rows($data);
                                if ($total1 != 0){
                                    while ( $result = mysqli_fetch_assoc($data)) {

                                        $idd=$result['user_id'];
                                        $image=$result['image'];
                                        $type=$result['status'];
                                        $title=$result['title'];
                                        $description=$result['description'];
                                        $lfdate=$result['found_or_lost_date'];
                                        $location=$result['location'];
                                        $area=$result['area'];
                                        $city=$result['city'];
                                        ?>
                                        <div class="jumbotron" style="margin-bottom: 6px ;margin-left: -10px;color: black ">
                                            <div class="row">
                                                <div class="col-xm-12  col-sm-12 col-md-12">
                                                    <h3 style="font-weight: bold;text-align: center;margin-top: -30px;"> <?php echo"$type<br/>"; ?></h3>
                                                    <?php
                                                    echo "<img width='175' height='175' src='upload_images/".$image."' ><br/>";
                                                    ?>
                                                    <label style="font-weight: bold;">Title :</label> <?php echo"$title<br/>"; ?>
                                                    <label style="font-weight: bold;"> Date:</label> <?php echo"$lfdate<br/>"; ?>

                                                    <label style="font-weight: bold;">Location :</label> <?php echo $location .", ". $area .", ". $city."<br/>" ?>
                                                    <label style="font-weight: bold;">Description :</label> <?php echo"$description<br/>"; ?>

                                                    <?php
                                                    $query11 ="SELECT * FROM userinfo";
                                                    $data11 = mysqli_query($conn,$query11);
                                                    //$userid=$_SESSION["userid"];
                                                    while ( $result = mysqli_fetch_assoc($data11)) {
                                                        if($idd==$result['user_id']){
                                                            $firstname =$result['first_name'];
                                                            $lastname =$result['last_name'];
                                                            $password=$result['password'];
                                                            $email=$result['email'];
                                                            $mobno=$result['mobno'];
                                                            $fblink=$result['fb_link'];
                                                            $thana=$result['thana'];
                                                            $district=$result['district'];
                                                            $division=$result['division'];

                                                        }
                                                    }
                                                    $x++;
                                                    ?>

                                                    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo<?php echo $x;?>">Contacts</button>
                                                    <div id="demo<?php echo $x;?>" class="collapse">
                                                        <h5><?php echo"$firstname $lastname"; ?></h5>
                                                        <label style="font-weight: bold;"> Email:</label> <?php echo"$email<br/>"; ?>
                                                        <label style="font-weight: bold;"> Mobile:</label> <?php echo"$mobno<br/>"; ?>
                                                        <label style="font-weight: bold;"> Facebook profile:</label> <a href="<?php echo"$fblink"; ?> " >Click here</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php }

                                }
                                if ($total1==0){
                                    echo "<script type='text/javascript'>alert('Please,select Area and Category')</script>";
                                }

                            }

                            ?>
                        </div>
                    </div>
                </div><?php ?>
            </div>

        </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6  col-sm-6">
            <h3 style="text-align: center;border: 2px solid #b1dfbb;background-color: #103572;padding: 10px;color: white;">Recent Found Item Post</h3>
            <?php

            $query ="SELECT * FROM post where status='Found' order by post_id desc ";
            $data = mysqli_query($conn,$query);
            //$userid=$_SESSION["userid"];
            $xx=0;
            while ( $result = mysqli_fetch_assoc($data)) {

                $idd=$result['user_id'];
                $image=$result['image'];
                $type=$result['status'];
                $title=$result['title'];
                $description=$result['description'];
                $lfdate=$result['found_or_lost date'];
                $location=$result['location'];
                $area=$result['area'];
                $city=$result['city'];
                ?>
                <div class="jumbotron" style="margin-bottom: 6px ;margin-left: -10px; ">
                    <div class="row">
                        <div class="col-xm-12  col-sm-12 col-md-12">
                            <h3 style="font-weight: bold;text-align: center;margin-top: -30px;"> <?php echo"$type<br/>"; ?></h3>
                            <?php
                            echo "<img width='175' height='175' src='upload_images/".$image."' ><br/>";
                            ?>
                            <label style="font-weight: bold;">Title :</label> <?php echo"$title<br/>"; ?>
                            <label style="font-weight: bold;"> Date:</label> <?php echo"$lfdate<br/>"; ?>

                            <label style="font-weight: bold;">Location :</label> <?php echo $location .", ". $area .", ". $city."<br/>" ?>
                            <label style="font-weight: bold;">Description :</label> <?php echo"$description<br/>"; ?>

                            <?php

                            $query11 ="SELECT * FROM userinfo";
                            $data11 = mysqli_query($conn,$query11);
                            //$userid=$_SESSION["userid"];
                            while ( $result = mysqli_fetch_assoc($data11)) {

                                if($idd==$result['user_id']){
                                    $firstname =$result['first_name'];
                                    $lastname =$result['last_name'];
                                    $email=$result['email'];
                                    $mobno=$result['mobno'];
                                    $location=$result['location'];
                                    $area=$result['area'];
                                    $city=$result['city'];
                                }
                            }
                            $x++;
                            ?>

                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo<?php echo $xx;?>">Contacts</button>
                            <div id="demo<?php echo $xx;?>" class="collapse">
                                <h5><?php echo"$firstname $lastname"; ?></h5>
                                <label style="font-weight: bold;"> Email:</label> <?php echo"$email<br/>"; ?>
                                <label style="font-weight: bold;"> Mobile:</label> <?php echo"$mobno<br/>"; ?>
                                <label style="font-weight: bold;"> Facebook profile:</label> <a href="<?php echo"$fblink"; ?> " >Click here</a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-lg-6 col-md-6  col-sm-6">
            <h3 style="text-align: center;border: 1px solid #b1dfbb;background-color: #103572;padding: 10px;color: white;">Recent Lost Item Post</h3>
            <?php

            $query ="SELECT * FROM post where status='Lost' order by post_id desc";
            $data = mysqli_query($conn,$query);
            //$userid=$_SESSION["userid"];
            $yy=0;
            while ( $result = mysqli_fetch_assoc($data)) {

                $idd=$result['user_id'];
                $image=$result['image'];
                $type=$result['status'];
                $title=$result['title'];
                $description=$result['description'];
                $lfdate=$result['found_or_lost_date'];
                $location=$result['location'];
                $area=$result['area'];
                $city=$result['city'];
                ?>
                <div class="jumbotron" style="margin-bottom: 6px ;margin-left: -10px; ">
                    <div class="row">
                        <div class="col-xm-12  col-sm-12 col-md-12">
                            <h3 style="font-weight: bold;text-align: center;margin-top: -30px;"> <?php echo"$type<br/>"; ?></h3>
                            <?php
                            echo "<img width='175' height='175' src='upload_images/".$image."' ><br/>";
                            ?>
                            <label style="font-weight: bold;">Title :</label> <?php echo"$title<br/>"; ?>
                            <label style="font-weight: bold;"> Date:</label> <?php echo"$lfdate<br/>"; ?>

                            <label style="font-weight: bold;">Location :</label> <?php echo $location .", ". $area .", ". $city."<br/>" ?>
                            <label style="font-weight: bold;">Description :</label> <?php echo"$description<br/>"; ?>

                            <?php

                            $query11 ="SELECT * FROM userinfo";
                            $data11 = mysqli_query($conn,$query11);
                            //$userid=$_SESSION["userid"];
                            while ( $result = mysqli_fetch_assoc($data11)) {

                                if($idd==$result['user_id']){
                                    $firstname =$result['first_name'];
                                    $lastname =$result['last_name'];
                                    $email=$result['email'];
                                    $fblink=$result['fb_link'];
                                    $mobno=$result['mobno'];
                                    $location=$result['location'];
                                    $area=$result['area'];
                                    $city=$result['city'];
                                }
                            }
                            $y++;
                            ?>

                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1<?php echo $yy;?>">Contacts</button>
                            <div id="demo1<?php echo $yy;?>" class="collapse">
                                <h5><?php echo"$firstname $lastname"; ?></h5>
                                <label style="font-weight: bold;"> Email:</label> <?php echo"$email<br/>"; ?>
                                <label style="font-weight: bold;"> Mobile:</label> <?php echo"$mobno<br/>"; ?>
                                <label style="font-weight: bold;"> Facebook profile:</label> <a href="<?php echo"$fblink"; ?> " >Click here</a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>



<?php 
include("Footer.php")
?>
