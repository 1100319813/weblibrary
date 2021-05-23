<?php
include 'database.php';
echo "hello";
echo $_POST["book_id"];
$sql = "INSERT INTO books (book_id, title, author_id, isbn, book_cover, summary) VALUES ('".$_POST["book_id"]."','".$_POST["title"]."','".$_POST["author_id"]."','".$_POST["isbn"]."','".$_POST["book_cover"]."','".$_POST["summary"]."')"; 

$result=mysqli_query($conn,$sql)or die("Could Not Perform the Query");

header("Location: allBooks.php"); 

mysqli_close($conn); //Make sure to close out the database connection
?>