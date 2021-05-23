<?php
    $url='localhost';
    $username='root';
    $password='';
	$dbname = "librarydb";
    try
{
    if ($conn=mysqli_connect($url,$username,$password, $dbname))
    {
        //do something
    }
    else
    {
        throw new Exception('Unable to connect');
    }
}
catch(Exception $e)
{
	echo "Error";
}
?>

