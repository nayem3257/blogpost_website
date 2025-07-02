<?php
session_start();
include"db.php";
include "allheader.php";

if(!isset($_SESSION['user_id'])){
   echo"You are not an admin";
   header ("location : login.php");
}
else{
if($_SESSION['user_role'] == "admin"){

  if(isset($_POST['submit'])){
    $name = $_POST['name'];
   $sql="INSERT INTO catagories (name) VALUES ('$name')";
   $result = mysqli_query($conn,$sql);
  if(!$result){
    echo"Erro!: {$conn->error}";
  }
  else{
    echo "category is added successfully";
  }
  }

}
else{
  header("location: dashboard.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="addcategory.php" method="POST">
    <input type="text" name="name">
    <input type="submit" name="submit" value="add category">
    <a href= "dashboard.php">Dashboard</a>
  </form>
</body>
</html>