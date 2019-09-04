<?php
include ("Navbar.php");
error_reporting(0);
include ("connection.php");
?>
<script>
    function categoryValidation(str) {
        var flag;
        if (str.length == 0) {
            document.getElementById("categoryValidationMsg").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("categoryValidationMsg").innerHTML = xmlhttp.responseText;
                    document.getElementById("categoryValidationMsg").style.color = 'red';
                }
            };
            xmlhttp.open("GET", "CategoryValidation.php?categoryname=" + str, true);
            xmlhttp.send();
        }
    }
</script>
<form>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-6">

            <div class="form-group">
                <label >New Category Name</label><span id="categoryValidationMsg"></span>
                <input type="text" class="form-control" onkeyup="categoryValidation(this.value)" name="newCategory"  placeholder="Enter New Category Name">

                <input class="form-group" type="submit"   name="submit" value="Add Category" >
            </div>
            <h2 style="text-align: center;">Category List</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Category Name</th>


                </tr>
                </thead>
                <tbody>
                <?php
                echo $_GET['hidden'];
                $query1 ="SELECT * FROM category";
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
    $categoryName = $_GET['newCategory'];
    if($categoryName !=''){
        $query = "INSERT INTO `category` (`id`, `name`) VALUES (NULL, '$categoryName');";

        $data = mysqli_query($conn,$query);
        header("Location:NewCategory.php");
    }else{
        echo "<script type='text/javascript'>alert('Please,Enter category Name')</script>";
    }

}

include ("Footer.php");
?>
