<?php
include("connection.php");

if (isset($_GET['cityname'])) {
    $g=$_GET['cityname'];
    $query="SELECT * FROM city WHERE name LIKE '$g%' ";
    $data = mysqli_query($conn,$query);
    $str='';
    while ($result = mysqli_fetch_assoc($data)) {
        $a=$result['name'];
        if ($str==''){
            $str=$a;
        }

    }

}
echo $str === "" ? "" : "This city is already exits in the database";
?>
