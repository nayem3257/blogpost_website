<?php
session_start();
include"db.php";
include "allheader.php";
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
}

if(!isset($_SESSION['user_id'])){
  header("location: dashboard.php");
}
else{
   if($_SESSION['user_role'] == "author"){
      header("location: displaypost.php");
   }
   else{
    
    if(isset($_POST['submit'])){
    $user_name = $_SESSION['user_name'];
    $user_email = $_SESSION['user_email'];
    $user_comment = $_POST['comment'];
    $sql = "INSERT INTO comments (post_id, username, email, comment) VALUES ('$post_id','$user_name','$user_email','$user_comment')";
    $result = mysqli_query($conn,$sql);
    if(!$result){
      echo"Error!: {$conn->error}";
    }
    else{
      echo "Comment is added successfully ";
    }
    }
   }
}

?>