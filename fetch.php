
<?php
include("connection.php");
error_reporting(0);
if (isset($_GET['q'])) {
    $g=$_GET['q'];
    $query="SELECT * FROM city WHERE name='$g' ";
    $data = mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($data);
    
    $id=$result['id'];
    //echo "<option>$id</option>";


    $str='';
    $query1="SELECT * FROM area WHERE city_id='$id' ";
    $data1 = mysqli_query($conn,$query1);
    while ($result1=mysqli_fetch_assoc($data1)) {
        $a=$result1['name'];
        echo "<option>$a</option>";
    }



    }

// echo"Location:". $location .",". $area .",". $city."<br/>";
//$location=$result['location'];
// $area=$result['area'];
//$city=$result['city'];


?>