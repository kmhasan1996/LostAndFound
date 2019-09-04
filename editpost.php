<?Php
include("connection.php");
include("Navbar.php");
session_start();
$userid = $_SESSION["userid"];
if ($userid == ""){
    header("Location:login.php");
}

$editpostid = $_REQUEST['editpostid'];

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

$query ="SELECT * FROM post where post_id ='$editpostid'";
$data = mysqli_query($conn,$query);
$edit_result = mysqli_fetch_assoc($data);

if (isset($_POST['editpost_submit'])) {
    $query ="SELECT * FROM post where post_id ='$editpostid'";
    $data = mysqli_query($conn,$query);
    $edit_result = mysqli_fetch_assoc($data);
    // Get image name

    $image = $_FILES['image']['name'];
if($image==""){
    $image=$edit_result['image'];
}
echo "upload".$image."<br/>";
echo "database".$edit_result['image'];
    // image file directory
    $target = "upload_images/".basename($image);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {


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





    $query = "UPDATE `post` set   image='$image', status='$type', category='$category', title='$title', description='$description', found_or_lost_date='$ldate', location='$location', city='$city',area='$area', time_limit='$time_limit' where post_id='$editpostid'";


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
                            <div class="col-md-5">

                                <input type="file" name="image" value="<?php echo $edit_result['image'] ?>">

                            </div>
                            <div class="col-md-4">

                                 <?php
                                    echo "<img width='150' height='150' src='upload_images/".$edit_result['image']."' >";
                                ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">Post Type:</label>
                            <div class="col-md-9">
                                <select class="form-control" name="type"  >
                                    <?php
                                    $selected_lost = $selected_found = "";
                                        if($edit_result['status'] == 'Lost'){
                                            $selected_lost = "selected";
                                        }
                                        else{
                                            $selected_found = "selected";
                                        }

                                    ?>;
                                    <option>Select one</option>
                                    <option <?php echo  $selected_lost; ?>>Lost</option>
                                    <option <?php echo  $selected_found; ?>>Found</option>


                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label">Categoty:</label>
                            <div class="col-md-9">
                                <select class="form-control"  name="category">
                                    <option ><?php echo$edit_result["category"]; ?></option>
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
                                <input type="text" class="form-control" name="title" value="<?php echo$edit_result["title"]; ?>" >
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description" class="col-md-3 control-label">Description:</label>
                            <div class="col-md-9">
                                <textarea type="text" class="form-control" name="description" ><?php echo$edit_result["description"]; ?></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="dob" class="col-md-3 control-label">Date:</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="ldate" value="<?php echo$edit_result["found_or_lost_date"]; ?>" placeholder="Date">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="location" class="col-md-3 control-label">Location:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="location" value="<?php echo$edit_result["location"]; ?>" placeholder="Location">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="thana" class="col-md-3 control-label">City:</label>
                            <div class="col-md-9">
                                <select class="form-control"  onchange="showHint(this.value)" name="city">
                                    <option ><?php echo$edit_result["city"]; ?></option>
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
                                <option ><?php echo$edit_result["area"]; ?></option>
                                <select class="form-control"  id="area" name="area">
                                    <option ><?php echo$result["area"]; ?></option>

                                </select>
                            </div>
                        </div>



                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">

                                <input type="submit" name="editpost_submit" value="Update post"/>
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