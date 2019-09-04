<?php
    // Start the session
    include ("Navbar.php");
    include("connection.php");
    error_reporting(0);
    session_start();

    $userid = $_SESSION["userid"];
    if ($userid == ""){
        header("Location:login.php");
    }

    $query1 ="SELECT * FROM userinfo";
    $data1 = mysqli_query($conn,$query1);


    while ( $result = mysqli_fetch_assoc($data1)) {

        if($userid==$result['user_id']){
            $userid1 =$result['user_id'];
            $image =$result['image'];
            $firstname =$result['first_name'];
            $lastname =$result['last_name'];
            $gender=$result['gender'];
            $dob =$result['dob'];
            $password=$result['password'];
            $email=$result['email'];
            $mobno=$result['mobno'];
            $fblink=$result['fb_link'];
            $city = $result['city'];
            $area = $result['area'];
             $_SESSION["userid1"] =$result['user_id'];
             $_SESSION["fname"] =$result['first_name'];
             $_SESSION["lname"] =$result['last_name'];

        }
    }
    ?>

   
<div class="container"> 
        
    <div class="row">
        <div class="col-xm-5 col-sm-5 col-md-5">
            <div class="jumbotron">
                <div class="row">
             <div class="col-sm-12 col-md-12">

                     <?php
                        echo "<img width='200' height='200' src='user_images/".$image."' >";
                     ?>
                </div>
                <div class="col-sm-12 col-md-12">
                    <h4><?php echo"$firstname $lastname"; ?></h4>
                    <small><i class="glyphicon glyphicon-map-marker"></i><?php echo" $area,$city"; ?> </small>
                <p>
                    <i class="glyphicon glyphicon-user"></i><?php echo" $gender"; ?><br />
                     <i class="glyphicon glyphicon-envelope"></i><?php echo" $email"; ?><br />
                    <i class="glyphicon glyphicon-earphone"></i><?php echo" $mobno"; ?><br />
                    <!--<i class="fa fa-facebook-official" style="font-size:30px;"></i><?php echo" $fblink"; ?><br />-->
                    <i class="glyphicon glyphicon-gift"></i><?php echo" $dob"; ?><br/>


                </p>


                </div>
            </div>
                </div>
        </div>

        <div class="col-xm-7  col-sm-7 col-md-7">

            <div class="jumbotron" style="margin-bottom: 15px ;margin-left: -10px; ">
                <div class="row">
                    <div class="col-xm-4  col-sm-4 col-md-4"></div>
                    <div class="col-xm-4  col-sm-4 col-md-4" >
                        <input type="button" class="btn btn-info" value="Post lost or found" onclick=" relocate_lost()">

                        <script>
                            function relocate_lost()
                            {
                                location.href = "lost.php";


                            }
                        </script>
                    </div>
                    <div class="col-xm-4  col-sm-4 col-md-4"></div>


                </div>

            </div>

            <div class="row" style="margin-bottom: 6px ;margin-top:6px; margin-left: -30px; ">
                 <div class="col-xm-12  col-sm-12 col-md-12">
                 <?php
                 $query1 ="SELECT * FROM post where user_id = '$userid'  ";
                 $data1 = mysqli_query($conn,$query1);
                 $result = mysqli_num_rows($data1);

                 ?>
                        <h3>Total posts:(<?php echo $result; ?>)</h3>

                 </div>
            </div>

            <?php
                $y=0;
                $query ="SELECT * FROM post";
                $data = mysqli_query($conn,$query);
                 //$userid=$_SESSION["userid"];
                $flag=0;
                while ( $result = mysqli_fetch_assoc($data)) {

                if($userid==$result['user_id']){
                     $flag=1;
                    $post_id=$result['post_id'];
                     $image=$result['image'];
                     $type=$result['status'];
                     $title=$result['title'];
                     $description=$result['description'];
                     $lfdate=$result['found_or_lost_date'];
                     $location=$result['location'];
                     $city = $result['city'];
                     $area = $result['area'];
                     $time = $result['time_limit'];
                     $y++;

        ?>
        <div class="jumbotron" style="margin-bottom: 6px ;margin-left: -10px; ">
                    <h3 style="font-weight: bold;text-align: center;margin-top: -30px;"> <?php echo"$type<br/>"; ?></h3>
                <hr>
                <div class="row">
                    <div class="col-xm-5  col-sm-5 col-md-5">
                     <?php
                             echo "<img width='150' height='150' src='upload_images/".$image."' >";
                      ?>
                </div>
                 <div class="col-xm-7  col-sm-7 col-md-7">

                     <label style="font-weight: bold;">Name :</label> <?php echo"$title<br/>"; ?>
                     <label style="font-weight: bold;"> Date:</label> <?php echo"$lfdate<br/>"; ?>

                     <label style="font-weight: bold;">Location :</label> <?php echo $location .", ". $area .", ". $city."<br/>" ?>
                     <label style="font-weight: bold;">Description :</label> <?php echo"$description<br/>"; ?>
                </div>
                <div style="margin-top: 20px " class="col-xm-12  col-sm-12 col-md-12">
                    <div class="row">

                            <div class="col-md-6">
                                <form method="get" action="editpost.php">
                                    <input type="hidden" value="<?php echo $post_id;?>" name="editpostid">
                                    <input type="submit" name="edit" value="Edit" >
                                </form>
                            </div>

                            <div class="col-md-6">
                                <form method="get" action="deletepost.php">
                                    <input type="hidden" value="<?php echo $post_id;?>" name="deletepostid">
                                    <input type="submit" name="delete" value="delete" >
                                </form>
                            </div>



                    </div>


                </div>

         </div>


    </div>
                <?php

            }
        }
        if($flag==0){

            ?>
            <h3 style="color: black;">You have not post anything yet!</h3>
            <?php
        }
?>


</div>
    </div>
                   
                                   
                              
</div>
<?php
include("Footer.php");
?>