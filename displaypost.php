<?php
session_start();
if(isset($_SESSION['user_name'])){
$user_name = $_SESSION['user_name'];
}
include "db.php";
include "allheader.php";
$sql = "select * from posts";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_assoc($result)){
    echo "{$row['title']} <br>";
    echo "{$row['content']} <br>";
    echo "<img src='image/{$row['image']}' width=400px height=500px> <br> ";
    echo "<a href='updatepost.php?post_id={$row['id']}'>Update</a> ";
    echo "<a href='Deletepost.php?post_id={$row['id']}'>Delete</a> ";
    echo " <form action='insertcomment.php?post_id={$row['id']}' method='POST'>
<textarea name='comment' placeholder = 'Write your comment'></textarea> <br>
<input type='submit' name='submit' value ='add comment'>
    </form>";
   
$post_id = $row['id'];    
$sql2 = "select *from comments where post_id = '$post_id'";
$result2 = mysqli_query($conn,$sql2);
echo "comments : <br>";
while( $row2 = mysqli_fetch_assoc($result2) ){
    echo "{$row2['username']} : {$row2['comment']} <br>";
}
echo"<hr>";
}



?>

