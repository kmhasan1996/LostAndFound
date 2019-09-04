<?php
    // Start the session
    include("connection.php");
    error_reporting(0);
    session_start();

    $query1 ="SELECT * FROM userinfo";
    $data1 = mysqli_query($conn,$query1);
    $userid=$_SESSION["userid"];
    while ( $result = mysqli_fetch_assoc($data1)) {

        if($userid==$result['user_id']){
            $userid1 =$result['user_id'];
            $firstname =$result['first_name'];
            $lastname =$result['last_name'];
            $_SESSION["userid1"] =$result['user_id'];
            $_SESSION["fname"] =$result['first_name'];
            $_SESSION["lname"] =$result['last_name'];

        }		
    }


    include("Navbar.php");
?>

<div class="container" style="background-color:white;margin-top:-15px;"> 
        
                <div class="row">
                    <div class="col-xm-4 col-sm-4 col-md-4">
                        <div class="jumbotron">
                            <p>Categories:</p>
                            <form method="get">
                                    <select class="form-control"  name="category">
                                        <option>Select One</option>
                                        <?php

                                        $query ="SELECT * FROM category";
                                        $data = mysqli_query($conn,$query);
                                        $total=mysqli_num_rows($data);
                                        while ( $result = mysqli_fetch_assoc($data)){
                                            ?>

                                            <option ><?php echo$result["name"]; ?></option>

                                            <?php
                                        }
                                        ?>
                                    </select>

                                <input type="submit" name="search_submit" value="Search"/>
                            </form>

                            <?php
                                $query ="SELECT * FROM post order by post_id desc;";
                                if ($_GET['search_submit']){
                                    $category=$_GET['category'];
                                    //echo $in;
                                    $query ="SELECT * FROM post where category='$category' ";

                                }
                                echo "<h4>Areas with no. of post</h4>";
                                $querya = "SELECT * from area";
                                $dataa=mysqli_query($conn,$querya);
                                while ( $result = mysqli_fetch_assoc($dataa)) {
                                        $area_name = $result['name'];
                                        $query_area="select * from post where area='$area_name'";
                                        $data1 = mysqli_query($conn,$query_area);
                                        $result = mysqli_num_rows($data1);
                                        echo $area_name."(".$result.")";?><br><?php
                                }
                            ?>
                            
                        </div>
                    </div>

                    
                    <div class="col-xm-8 col-sm-8 col-md-8" >
                            <?php
                            $data = mysqli_query($conn,$query);
                           $flag=0;
                            $x=0;
                            while ( $result = mysqli_fetch_assoc($data)) {
                                    $flag=1;
                                    $image=$result['image'];
                                    $idd=$result['user_id'];
                                    $type=$result['status'];
                                    $title=$result['title'];
                                    $description=$result['description'];
                                    $lfdate=$result['found_or_lost_date'];
                                    $location=$result['location'];
                                    $area=$result['area'];
                                    $city=$result['city'];
                                    ?>
                                    <div class="jumbotron" style="margin-bottom: 6px ;margin-left: -10px; ">
                                                <h3 style="font-weight: bold;text-align: center;margin-top: -30px;"> <?php echo"$type<br/>"; ?></h3>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xm-5  col-sm-5 col-md-5">
                                                     <?php
                                                             echo "<img width='175' height='175' src='upload_images/".$image."' >";
                                                      ?>
                                                </div>
                                                 <div class="col-xm-7 col-sm-7 col-md-7">

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
                                                                $fblink=$result['fb_link'];
                                                                $location=$result['location'];
                                                                $area=$result['area'];
                                                                $city=$result['city'];
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
                            <?php
                            }
                            if($flag==0){

                                ?>
                                <h3 style="color: black;">No post found!</h3>
                                <?php
                            }
                            ?>

                    </div>
                    <div class="col-xm-2 col-sm-2 col-md-2">

                    </div>

                </div>
</div>
<?php
    include("Footer.php");
?>
