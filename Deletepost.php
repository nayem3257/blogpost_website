<?php
session_start();
include "db.php";
include "allheader.php";
if(!isset($_SESSION['user_id'])){
  header("location: login.php");
}
else{

if($_SESSION['user_role'] == "subscriber"){
    header("location: dashboard.php");
}
else{

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
}

$sql = "delete from posts where id = '$post_id'";
$result = mysqli_query($conn,$sql);

if(!$result){
    echo"Error!: {$conn->error}";
}
else{
    echo "The post has been deleted successfully";
}
}
}
?>


