<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'database.php';
    $sql=mysqli_query($conn,"SELECT * FROM users where email='$email' and password='md5($pass)'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["id"] = $row['id'];
		$_SESSION["name"]=$row['name'];
		$_SESSION["grade"]=$row['grade'];
        $_SESSION["email"]=$row['email'];
        $_SESSION["phone"]=$row['phone'];
        $_SESSION["admin"]=$row['admin']; 
        header("Location: allBooks.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>