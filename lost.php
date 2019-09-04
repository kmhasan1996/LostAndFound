<?php
include ("Navbar.php");
// Start the session
include("connection.php");
error_reporting(0);
session_start();
$userid = $_SESSION["userid"];
if ($userid == ""){
    header("Location:login.php");
}
?>
  <script>
        function showHint(str) {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("area").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET", "fetch.php?q=" + str, true);
            xmlhttp.send();


        }
    </script>
   <?php

        $userid=$_SESSION["userid1"];
        $firstname=$_SESSION["fname"];
        $lastname=$_SESSION["lname"];
        
       
        if (isset($_POST['signup_submit'])) {

            // Get image name
            $image = $_FILES['image']['name'];

            // image file directory
            $target = "upload_images/".basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

                ?>
                <script>alert("Image uploaded successfully");</script>
                <?php
            }else{

                ?>
                <script>alert("Failed to upload image");</script>
                <?php
            }


            //$image=$_GET['image'];
            $type=$_POST['type'];
            $title=$_POST['title'];
            $category=$_POST['category'];
            $description=$_POST['description'];
            $ldate=$_POST['ldate'];
            $location=$_POST['location'];
            $city=$_POST['city'];
            $area=$_POST['area'];

            $time=date("h:i:sa") + 3600;
            $time_limit=date("g:i a",$time);
            //$time_limit = $_POST['ldate'];
            
            



             $query = "INSERT INTO `post` (`post_id`, `user_id`, `image`,`status`,`category`, `title`, `description`, `found_or_lost_date`, `location`, `city`, `area`, `time_limit`) VALUES (NULL, '$userid','$image', '$type','$category', '$title', '$description', '$ldate', '$location', '$city', '$area','$time_limit');";
                            
             $data = mysqli_query($conn,$query);
            ?>
                <script>alert("your post added successfully");</script>
            <?php
            header("Location:userinfo.php");
            
        }
        //echo "$type $title $description $ldate $location $thana $district $division";
    ?>

  
<div class="container" >
    <div class="row">
        <div class="col-lg-2 col-sm-2"></div>
        <div class="col-lg-8 col-sm-8">
            <div class="jumbotron">
                <form  method="POST" class="form-horizontal"  enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="image" class="col-md-3 control-label">Image:</label>
                        <div class="col-md-9">
                            <input type="file" name="image">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">Post Type:</label>
                             <div class="col-md-9">
                                 <select class="form-control" name="type" >

                                        <option>Select one</option>
                                        <option>Lost</option>
                                        <option>Found</option>


                                      </select>
                             </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Categoty:</label>
                        <div class="col-md-9">
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-md-3 control-label">Name:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="" placeholder="Enter title">
                        </div>
                    </div>


                    <div class="form-group">
                         <label for="description" class="col-md-3 control-label">Description:</label>
                             <div class="col-md-9">
                                 <textarea type="text" class="form-control" name="description" value="" placeholder="Product description"></textarea>
                            </div>
                    </div>
                    
                    
                    <div class="form-group">
                         <label for="dob" class="col-md-3 control-label">Date:</label>
                             <div class="col-md-9">
                                 <input type="date" class="form-control" name="ldate" value="" placeholder="Date">
                            </div>
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <label for="location" class="col-md-3 control-label">Location:</label>
                             <div class="col-md-9">
                                 <input type="text" class="form-control" name="location" value="" placeholder="Location">
                            </div>
                    </div>
                                    
        
                    
                    <div class="form-group">
                        <label for="thana" class="col-md-3 control-label">City:</label>
                             <div class="col-md-9">
                                <select class="form-control"  onchange="showHint(this.value)" name="city">
                                    <option>Select One</option>
                                    <?php
                                        include("connection.php");
                                        error_reporting(0);

                                        $query ="SELECT * FROM city";
                                        $data = mysqli_query($conn,$query);
                                        $total=mysqli_num_rows($data);
                                        while ( $result = mysqli_fetch_assoc($data)){
                                            ?>

                                                <option ><?php echo$result["name"]; ?></option>

                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                    </div>
                     <div class="form-group">
                        <label for="district" class="col-md-3 control-label">Area:</label>
                             <div class="col-md-9">
                             <select class="form-control"  id="area" name="area">
                                <option>Select One</option>
                            </select>
                            </div>
                    </div>
                     
                    

                    <div class="form-group">
                     <!-- Button -->                                        
                        <div class="col-md-offset-3 col-md-9">
                            
                            <input type="submit" name="signup_submit" value="Submit"/>
                         </div>
                    </div>
                        
                                
                                
                                
                </form>
                
                
             </div> <!-- jumbotron --> 
        </div><!-- col-lg-8 col-sm-8 --> 
        <div class="col-lg-2 col-sm-2"></div>
    </div> <!-- row --> 
</div> <!-- container -->
<?php
include("Footer.php");
?>