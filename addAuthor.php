<?php
include 'database.php';
echo "hello";
$sql = "INSERT INTO author (author_id, author_name, extra_info) VALUES ('".$_POST["author_id"]."','".$_POST["author_name"]."','".$_POST["extra_info"]."')"; 

$result=mysqli_query($conn,$sql)or die("Could Not Perform the Query");

header("Location: allAuthors.php"); 

mysqli_close($conn); //Make sure to close out the database connection
?>