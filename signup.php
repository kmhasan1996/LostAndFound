 <?php
	include("connection.php");
    error_reporting(0);
    include("Navbar.php");
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

    function emailValidation(str) {    
        if (str.length == 0) { 
            document.getElementById("emailValidationMsg").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("emailValidationMsg").innerHTML = xmlhttp.responseText;
                    document.getElementById("emailValidationMsg").style.color = 'red';
                }
            };  
            xmlhttp.open("GET", "getEmailvalidationMsg.php?email=" + str, true);
            xmlhttp.send();
        }
    }
    
</script>
<div class="container" >
    <h3 style="text-align:center;margin-bottom:20px;">User Registration Forms</h3>
    <form method="POST"  enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-6 col-sm-6">

                <div class="form-group">
                    <label> Image:</label>
                    <input type="file" name="image">
                </div>

                <div class="form-group">
                    <label >First Name</label>
                    <input type="text" class="form-control" name="firstname"  placeholder="Enter Your First Name">
                    
                </div>

                <div class="form-group">
                    <label >Last Name</label>
                    <input type="text" class="form-control" name="lastname"  placeholder="Enter Your Last Name">
                    
                </div>

                <div class="form-group">
                    <label >Gender</label>
                    <div class="form-control">
                        <label  class="radio-inline col-md-6">
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male" >Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                        </label>
                    </div>   
                </div>

                <div class="form-group">
                    <label >Date of birth</label>
                    <input type="date" class="form-control"  name="dob" >
                    
                </div>

                <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password"  placeholder="Enter Minimum 6 Character">
                    
                </div>

            </div> 
            <div class="col-lg-6 col-sm-6">
                <div class="form-group">
                    <label >Email address  </label><span id="emailValidationMsg"></span>
                    <input type="email" class="form-control" onchange="emailValidation(this.value)" name="email"   placeholder="Enter Your Email Address">
                    
                </div>

                <div class="form-group">
                    <label >Mobile</label>
                    <input type="text" class="form-control" name="mobno" placeholder="Enter Your Mobile No.">
                    
                </div>

                <div class="form-group">
                    <label >Facebook profile link</label>
                    <input type="text" class="form-control" name="fblink"  placeholder="Enter Your Facebook profile Link">
                    
                </div>

                <div class="form-group">
                    <label >City</label>
                    <select class="form-control" onchange="showHint(this.value)" name="city">
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

                <div class="form-group">
                    <label >Area</label>
                    <select class="form-control" id="area" name="area">
                        <option>Select One</option>
                    </select>
                    
                </div>

                <div class="form-group">
                    <input type="submit" name="signup_submit" value="SignUp"/>
                </div>  

            </div>     
              
            
        </div>

    </form>
            
        
</div> <!-- container --> 
<?php

    if (isset($_POST['signup_submit'])) {
            // Get image name
            $image = $_FILES['image']['name'];

            // image file directory
            $target = "user_images/".basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

                $fname = $_POST['firstname'];
                $lname = $_POST['lastname'];
                $gen = $_POST['gender'];
                $dobb = $_POST['dob'];
                $pass = $_POST['password'];
                $ema = $_POST['email'];
                $mno = $_POST['mobno'];
                $fb = $_POST['fblink'];
                $city = $_POST['city'];
                $area = $_POST['area'];

                //echo $fname. $lname. $gen. $dobb. $pass .$ema .$mno. $fb. $city.$area;


                if ($fname !="" && $pass !="") {
                    $query = "INSERT INTO `userinfo`(`user_id`,`image`,`first_name`,`last_name`,`gender`,`dob`,`password`,`email`,`mobno`,`fb_link`,`city`,`area`) VALUES ('','$image','$fname','$lname','$gen','$dobb','$pass','$ema','$mno','$fb','$city','$area');";

                    $data = mysqli_query($conn,$query);


                    if ($data) {
                        ?>
                        <script>alert("SignUp Successful");</script>
                        <?php
                       header("Location:login.php");
                    }
                }
                else{

                    ?>
                    <script>alert("SignUp Failed! please, fillup all field");</script>
                    <?php
                }


            }else{

                ?>
                <script>alert("Failed to upload image");</script>
                <?php
            }

    }

    include("Footer.php")
?>