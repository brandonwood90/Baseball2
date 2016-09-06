<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
include("Functions.php")
$connection = mysqli_connect("localhost", "root", "","baseball");
// Selecting Database
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query=mysqli_query($connection, "select * from login where username='$user_check'");

$row = mysqli_fetch_assoc($query);

$login_session = $row['username'];
$login_firstname = $row['firstname'];
$login_lastname = $row['lastname'];

if(!isset($login_session))
{
	mysqli_close($connection); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}
?>