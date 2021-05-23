

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Вход в Библиотеку</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<h1> Results found in Books </h1>


<?php
include 'database.php';

session_start();
if(!isset($_SESSION["user_id"])){
	header("Location: login.php"); 
}

else {
	$s = $_POST["search"];
	//echo $s;
	$query = "SELECT * FROM books WHERE title LIKE '%{$s}%' or isbn LIKE '%{$s}%' or summary LIKE '%{$s}%'"; 
	$result = mysqli_query($conn, $query);
	
	echo "<br><br>"; // start a table tag in the HTML
	//$row = mysqli_num_rows($result);
	//echo $row;
	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
		echo "<br>" . "Book id: " . $row['book_id'] . "<br>" . "Title: " . $row['title'] . "<br>" . "Author id: " . $row['author_id'] . "<br>" . "ISBN: " . $row['isbn'] . "<br>" . "Summary: " . $row['summary'] . "<br>";  //$row['index'] the index here is a field name
	}


	echo "<br><br>"; //Close the table in HTML

	mysqli_close($conn); //Make sure to close out the database connection
}
	
?>



</html>