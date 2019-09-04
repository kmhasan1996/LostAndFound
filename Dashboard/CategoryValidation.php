<?php
include("connection.php");

if (isset($_GET['categoryname'])) {
    $g=$_GET['categoryname'];
    $query="SELECT * FROM category WHERE name LIKE '$g%' ";
    $data = mysqli_query($conn,$query);
    $str='';
    while ($result = mysqli_fetch_assoc($data)) {
        $a=$result['name'];
        if ($str==''){
            $str=$a;
        }

    }

}
echo $str === "" ? "" : "This categoryname is already exits in the database";
?>
