<?php
include 'database.php';
echo "hello";
$sql = "INSERT INTO usersbooks (user_id, book_id, checkout_date, return_date) VALUES ('".$_POST["user_id"]."','".$_POST["book_id"]."','".$_POST["checkout_date"]."','".$_POST["return_date"]."')"; 

$result=mysqli_query($conn,$sql)or die("Could Not Perform the Query");

header("Location: allRecords.php"); 

mysqli_close($conn); //Make sure to close out the database connection
?>