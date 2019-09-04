<?php
include("connection.php");
error_reporting(0);
if (isset($_GET['q'])) {
    $g=$_GET['q'];
    $query="SELECT distinct (category) FROM post WHERE area='$g' && status='Lost' ";
    $data = mysqli_query($conn,$query);
    //$result=mysqli_fetch_assoc($data);

    while ($result1=mysqli_fetch_assoc($data)) {
        $a=$result1['category'];
        echo "<option>$a</option>";
    }


}

