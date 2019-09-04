<?php
    include("connection.php");

    if (isset($_GET['email'])) {
        $g=$_GET['email'];
        $query="SELECT * FROM userinfo WHERE email LIKE '$g%' ";
        $data = mysqli_query($conn,$query);
        $str='';
        while ($result = mysqli_fetch_assoc($data)) {
            $a=$result['email'];
            if ($str==''){
                $str=$a;
            }
            
        }

    }
    echo $str === "" ? "" : "This email is already exits in the database";
?>