<?php
include 'database.php';
echo "hello";
$sql = "INSERT INTO users (user_id, name, grade, email, phone, password, admin) VALUES ('".$_POST["user_id"]."','".$_POST["name"]."','".$_POST["grade"]."','".$_POST["email"]."','".$_POST["phone"]."','".$_POST["password"]."','0')"; 

$result=mysqli_query($conn,$sql)or die("Could Not Perform the Query");

header("Location: allUsers.php"); 

mysqli_close($conn); //Make sure to close out the database connection
?>