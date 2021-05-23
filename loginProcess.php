<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
	$email = $_POST["email"];
	$pass = $_POST["pass"];
    $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$pass'";
	$result=mysqli_query($conn,$sql);

	//echo $pass;
    //$row  = mysqli_fetch_array($conn, $sql);
	//echo "hello";
	//echo $email;
	$row = mysqli_fetch_array($result);
	$check = mysqli_num_rows($result);
	//echo $check;
    if($check > 0)
    {
		
        $_SESSION["user_id"]=$row['user_id'];
		$_SESSION["name"]=$row['name'];
		$_SESSION["grade"]=$row['grade'];
        $_SESSION["email"]=$row['email'];
        $_SESSION["phone"]=$row['phone'];
        $_SESSION["admin"]=$row['admin']; 
		if ($row['admin'] == "1") {
			header("Location: allBooks.php"); 
		}
		else if ($row['admin'] == "0") {
			header("Location: userBooks.php");
		}
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>
