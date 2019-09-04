<?php
include ("Navbar.php");
error_reporting(0);
include ("connection.php");
?>
<script>
    function cityValidation(str) {
        var flag;
        if (str.length == 0) {
            document.getElementById("cityValidationMsg").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cityValidationMsg").innerHTML = xmlhttp.responseText;
                    document.getElementById("cityValidationMsg").style.color = 'red';
                }
            };
            xmlhttp.open("GET", "CityValidation.php?cityname=" + str, true);
            xmlhttp.send();
        }
    }
</script>
<form>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-4">

            <div class="form-group">
                <label >New City Name</label><span id="cityValidationMsg"></span>
                <input type="text" class="form-control" onkeyup="cityValidation(this.value)" name="newCity"  placeholder="Enter New City Name">

                <input class="form-group" type="submit"   name="submit" value="Add City" >
            </div>
            <h2 style="text-align: center;">City List</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">City Name</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $_GET['hidden'];
                    $query1 ="SELECT * FROM city";
                    $data1 = mysqli_query($conn,$query1);

                    while ( $result = mysqli_fetch_assoc($data1)) {
                        ?>
                        <tr>
                            <td ><?php echo $result['name']; ?></td>

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
    $cityName = $_GET['newCity'];
    $query = "INSERT INTO `city` (`id`, `name`) VALUES (NULL, '$cityName');";

    $data = mysqli_query($conn,$query);
    header("Location:NewCity.php");
}

include ("Footer.php");
?>