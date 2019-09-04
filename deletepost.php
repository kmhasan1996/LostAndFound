<?Php
include("connection.php");
session_start();
$userid = $_SESSION["userid"];
if ($userid == ""){
    header("Location:login.php");
}

$postid = $_REQUEST['deletepostid'];

$query = "DELETE FROM `post` WHERE `post`.`post_id` = '$postid' ";
$data = mysqli_query($conn,$query);
//$result = mysqli_fetch_assoc($data);
if($data){
    ?>
    <script>alert("Post Deleted Successful");</script>
    <?php

}
else{
    ?>
    <script>alert("Delete Failed");</script>
    <?php
}
header("Location:userinfo.php");
?>