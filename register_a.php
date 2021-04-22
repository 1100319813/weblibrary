<?php
extract($_POST);
include("database.php");
$sql=mysqli_query($conn,"SELECT * FROM users where email='$email'");
$query="INSERT INTO register(user_id, name, grade, email, phone, password, admin ) VALUES ('$id', '$first_name', '$grade', '$email', '$phone', 'md5($pass)', '$admin')";
$sql=mysqli_query($conn,$query)or die("Could Not Perform the Query");
header ("Location: login.php?status=success");


?>