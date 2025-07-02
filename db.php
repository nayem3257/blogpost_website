<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "blog_post";

$conn= new mysqli($server,$user,$pass,$dbname);
if(!$conn){
  echo"error!:{$conn->connect_erro}";
}
?>