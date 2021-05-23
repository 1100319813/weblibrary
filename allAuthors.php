

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
<h1> All Authors </h1>

<div class="signup-form">
    <form action="searchAuthor.php" method="post" enctype="multipart/form-data">
		<h2>Enter what you want to search</h2>
        <div class="form-group">
        	<input type="search" class="form-control" name="search" placeholder="Enter query here" required="required">
        </div>
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Search</button>
        
    </form>
</div>

<body>

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
    <form action="allRecords.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">View All Records</button>
        
    </form>
</div>

<div class="signup-form">
    <form action="addAuthor.php" method="post" enctype="multipart/form-data">
		<h2>Add Author</h2>
		<p class="hint-text">Enter Author Info</p>
        <div class="form-group">
        	<input type="author_id" class="form-control" name="author_id" placeholder="ID" required="required">
        </div>
		<div class="form-group">
            <input type="author_name" class="form-control" name="author_name" placeholder="Author name" required="required">
        </div>
		<div class="form-group">
            <input type="extra_info" class="form-control" name="extra_info" placeholder="Details about the author" required="required">
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
	$query = "SELECT * FROM author"; 
	$result = mysqli_query($conn, $query);

	echo "<br><br>"; // start a table tag in the HTML

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	echo "<br>" . "Author id: " . $row['author_id'] . "<br>" . "Author name: " . $row['author_name'] . "<br>" . "Author info: " . $row['extra_info'] . "<br><br>";  //$row['index'] the index here is a field name
	}

	echo "<br><br>";; //Close the table in HTML

	mysqli_close($conn); //Make sure to close out the database connection
}
?>

        
</body>
</html>