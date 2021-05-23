
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
<h1> All Records </h1>
<div class="signup-form">
    <form action="allAuthors.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">View All Authors</button>
        
    </form>
</div>
<div class="signup-form">
    <form action="allUsers.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">View All Users</button>
        
    </form>
</div>
<div class="signup-form">
    <form action="allBooks.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">View All Books</button>
        
    </form>
</div>

<div class="signup-form">
    <form action="addRecord.php" method="post" enctype="multipart/form-data">
		<h2>Add Record</h2>
		<p class="hint-text">Enter Record Info</p>
        <div class="form-group">
        	<input type="user_id" class="form-control" name="user_id" placeholder="User's ID" required="required">
        </div>
		<div class="form-group">
            <input type="book_id" class="form-control" name="book_id" placeholder="Book's ID" required="required">
        </div>
		<div class="form-group">
            <input type="checkout_date" class="form-control" name="checkout_date" placeholder="Checkout Date" required="required">
        </div>
		<div class="form-group">
            <input type="return_date" class="form-control" name="return_date" placeholder="Return Date" required="required">
        </div>
		
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Add</button>
        </div>
    </form>
</div>

<?php
include 'database.php';
session_start();
if(!isset($_SESSION["user_id"])){
	header("Location: login.php"); 
}
elseif ($_SESSION["admin"] == "0") {
	header("Location: AcessDenied.php"); 
}
else {
	$query = "SELECT * FROM usersbooks"; 
	$result = mysqli_query($conn, $query);

	echo "<br><br>"; // start a table tag in the HTML

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
		$d = $row['user_id'];
		$query1 = "SELECT * FROM users WHERE user_id = '$d'"; 
		$result1 = mysqli_query($conn, $query1);
		$row1 = mysqli_fetch_array($result1);
		
		$s = $row['book_id'];
		$query2 = "SELECT * FROM books WHERE book_id = '$s'"; 
		$result2 = mysqli_query($conn, $query2);
		$row2 = mysqli_fetch_array($result2);
		echo "<br>" . "User: " . $row1['name'] . "<br>" . "Book: " . $row2['title'] . "<br>" . "Checkout date: " . $row['checkout_date'] . "<br>" . "Return date: " . $row['return_date'] . "<br>";  //$row['index'] the index here is a field name
	}

	echo "<br><br>"; //Close the table in HTML

	mysqli_close($conn); //Make sure to close out the database connection
}
?>
        
</body>
</html>