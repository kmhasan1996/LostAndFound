<?php
include ("Navbar.php");
error_reporting(0);
include ("connection.php");
?>
    <
    <form>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label >City</label>
                    <select class="form-control"  name="cityName">
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
                    <label >New Area Name</label>
                    <input type="text" class="form-control"  name="newArea"  placeholder="Enter New Area Name">

                    <input class="form-group" type="submit"   name="submit" value="Add Area" >
                </div>
                <h2 style="text-align: center;">Area List</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">City Name</th>
                        <th scope="col">Area Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $query1 ="SELECT * FROM area";
                    $data1 = mysqli_query($conn,$query1);

                    while ( $result1 = mysqli_fetch_assoc($data1)) {
                            $City_id = $result1['city_id'];
                            $query ="SELECT name FROM city where id ='$City_id'";
                            $data = mysqli_query($conn,$query);
                            $result = mysqli_fetch_assoc($data);

                        ?>
                        <tr>
                            <td ><?php echo $result['name']; ?></td>
                            <td ><?php echo $result1['name']; ?></td>

                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>

        </div>
    </form>

<?php

if ($_GET['submit']) {
    //echo $_GET['cityName'];
    //echo  "ADFsa".$data1;
    $selectedCity =  $_GET['cityName'];
    $query1 ="SELECT id FROM city where name ='$selectedCity'";
    $data1 = mysqli_query($conn,$query1);
    $result= mysqli_fetch_assoc($data1);
    $Cityid=$result['id'];
    //echo  $id;
    $AreaName = $_GET['newArea'];
    $query = "INSERT INTO `area` (`id`,`city_id`, `name`) VALUES (NULL,'$Cityid','$AreaName');";

    $data = mysqli_query($conn,$query);
    header("Location:NewArea.php");
}

include ("Footer.php");
?><?php
