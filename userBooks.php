

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

<body>
<h1>Your Books </h1>


<div class="signup-form">
    <form action="userAllAuthors.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">View All Authors</button>
        
    </form>
</div>
<div class="signup-form">
    <form action="userAllBooks.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">View All Books</button>
        
    </form>
</div>
   

<?php
session_start();
include 'database.php';
echo $_SESSION["user_id"];
if(!isset($_SESSION["user_id"])){
	header("Location: login.php"); 
}

else {
	$d = $_SESSION['user_id'];
	//echo $d;
	//echo "hello";
	$query = "SELECT * FROM usersbooks WHERE user_id = $d"; 
	$result = mysqli_query($conn, $query);

	echo "<br>"; // start a table tag in the HTML

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	echo "<br>" . "Book id: " . $row['book_id'] . "<br>" . "Checkout date: " . $row['checkout_date'] . "<br>" . "Return date: " . $row['return_date'];  //$row['index'] the index here is a field name
	$g = $row['book_id'];
	$query1 = "SELECT * FROM books WHERE book_id = $g"; 
	$result1 = mysqli_query($conn, $query1);
	while($row1 = mysqli_fetch_array($result1)){
	echo "<br>" . "Title: " . $row1['title'] . "<br>" . "Author Id: " . $row1['author_id'] . "<br>" . "ISBN: " . $row1['isbn'] . "<br>" . "Summary: " . $row1['summary'] . "<br>";  //$row['index'] the index here is a field name
	}
	}

	echo "<br><br>"; //Close the table in HTML
	//echo $d;
	//echo "hello";
	mysqli_close($conn); //Make sure to close out the database connection
}
	
?>
   
</body>
</html>