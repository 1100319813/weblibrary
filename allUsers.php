
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
<h1> All Users </h1>

<div class="signup-form">
    <form action="searchUser.php" method="post" enctype="multipart/form-data">
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
    <form action="allAuthors.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">View All Authors</button>
        
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
    <form action="addUser.php" method="post" enctype="multipart/form-data">
		<h2>Add User</h2>
		<p class="hint-text">Enter User Info</p>
        <div class="form-group">
        	<input type="user_id" class="form-control" name="user_id" placeholder="ID" required="required">
        </div>
		<div class="form-group">
            <input type="name" class="form-control" name="name" placeholder="Full name" required="required">
        </div>
		<div class="form-group">
            <input type="grade" class="form-control" name="grade" placeholder="Grade Level" required="required">
        </div>
		<div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="phone" class="form-control" name="phone" placeholder="Phone Number" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="admin" class="form-control" name="admin" placeholder="Admin or not" required="required">
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
	$query = "SELECT * FROM users"; 
	$result = mysqli_query($conn, $query);

	echo "<br><br>"; // start a table tag in the HTML

	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
	echo "<br>" . "Id: " . $row['user_id'] . "<br>" . "Full name: " . $row['name'] . "<br>" . "Grade level: " . $row['grade'] . "<br>" . "Email: " . $row['email'] . "<br>" . "Phone num: " . $row['phone'] . "<br>" . "Admin or not: " . $row['admin'] . "<br>";  //$row['index'] the index here is a field name
	}

	echo "<br><br>"; //Close the table in HTML

	mysqli_close($conn); //Make sure to close out the database connection
}
?>
        
</body>
</html>