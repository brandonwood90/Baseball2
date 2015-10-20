<?php
include('functions.php');
$error=""; // Variable To Store Error Message
$output = "notblank"; // variable to store error output from ready

//Run on user hitting submit button
if (isset($_POST['submit'])) 
{
	//Send to function FormReady check if form input is valid
	$output = FormReady();
	
	//If no form input errors go
	if ($output == "")
	{
		//setup database connection information
		$connection = mysql_connect("localhost", "root", "");
		$db = mysql_select_db("baseball", $connection);
		
		//set varables from user input after mysql_safe function is run from funtions.php file
		$firstname = mysql_safe($_POST['firstname']);
		$lastname =  mysql_safe($_POST['lastname']);
		$username= mysql_safe($_POST['username']);
		$email= mysql_safe($_POST['email']);
		//for password hash with MD5 first then SHA
		$password = sha1(md5(mysql_safe($_POST['password'])));
	    
		//Get query to check for user is in database
		$query = mysql_query("select username from login where username='$username'", $connection);
		$row =  mysql_fetch_assoc($query);
		$userCheck = $row['username'];
		
		//checks to see if the username input by user is the same as the one from database
		if(!isset($userCheck))	
		{	
			//get query to check if email is in database
			$query = mysql_query("select email from login where email='$email'", $connection);
			$row =  mysql_fetch_assoc($query);
			$emailCheck = $row['email'];
			
			//check to see if email that was input by user is already in database
			if(!isset($emailCheck))
			{
				//checks if error while connecting to databes
				if(mysql_query("INSERT INTO login(firstname, lastname, username, password, email) VALUES('$firstname','$lastname','$username', '$password', '$email')", $connection))
				{
					//use javascript to alert them that there input was successfully stored in database
					echo("<script>alert('successfully registered ');</script>");
					//now that the user can login, redirect to login page
					header('Location: LoginPage.php');
					//close mysql connection
					mysql_close($connection);
				}
				else
				{
					//the mysql database had a connection error alert user
					echo("<script>alert('error while registering you...');</script>");
					//close mysql connection
					mysql_close($connection);
				}
			}
			else //email inputed by user already exists in database
			{
				//alert the user that the email is already in use
				$error = "<br>E-mail already exists in database";
				//close mysql connection
				mysql_close($connection);
			}
		}
		else //username inputed by user already exists in database
		{
			//alert user that the username is already in use
			$error = "<br>Username already exists in database";
			//close mysql connection
			mysql_close($connection);
		}
	}
	$error .= $output; 
	
}
//function to validate whether the user input is ready to go into the database
function FormReady()
{
	$error = ""; //set error variable to blank
	//set variable for the user input data to be checked
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email=$_POST['email'];
	$password =$_POST['password'];
	$verifyPassword = $_POST['vpassword'];
	
	
	//Check is password matches verfication password
	if ($password != $verifyPassword)
	{
		//notify user
		$error .= "<br>Password doesn't match verification password.";
	}
	//check if firstname textbox is blank
	if(empty($_POST['firstname']))
	{
		//notify user
		$error .= "<br>Firstname textblock is blank.";
	}
	//check if lastname textbox is blank
	if(empty($_POST['lastname']))
	{
		//notify user
		$error .= "<br>Lastname textblock is blank.";
	}
	//check if username textbox is blank
	if(empty($_POST['username']))
	{
		//notify user
		$error .= "<br>Username textblock is blank.";
	}
	//check if email textbox is blank
	if(empty($_POST['email']))
	{
		//notify user
		$error .= "<br>E-mail textblock is blank.";
	}
	//check if password textbox is blank
	if(empty($_POST['password']))
	{
		//notify user
		$error .= "<br>Password textblock is blank.";
	}
	//check if  vpassword textbox is blank
	if(empty($_POST['vpassword']))
	{
		//notify user
		$error .= "<br>Verify password textblock is blank.";
	}
	if (!preg_match("/^[a-z ,.'-]+$/i", $firstname))
	{
		$error .= "<br>Firstname is not valid";
	}
	if (!preg_match("/^[a-z ,.'-]+$/i", $firstname))
	{
		$error .= "<br>Lastname is not valid";
	}
		/*
	regex explanation
	^: anchored to beginning of string
	\S*: any set of characters
	(?=\S{8,}): of at least length 8
	(?=\S*[a-z]): containing at least one lowercase letter
	(?=\S*[A-Z]): and at least one uppercase letter
	(?=\S*[\W]) : and at least one special char
	(?=\S*[\d]): and at least one number
	$: anchored to the end of the string
	*/
	if (!preg_match('/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/',$password))
		{
		$error .= "<br>Password must be 8 characters long, conataining atleast 1 lowercase chararacter, one uppercase charcaracter, one number, and one special character";
		}
		/*
		regex for email with 2-4 char top level domain name
	*/
	if (!preg_match('/^[A-Za-z0-9.%+\-]+@[A-Za-z0-9.\-]+\.[A-Za-z]{2,4}$/', $email))
	{
		$error .= "<br>E-mail: " . $email ." is not a valid e-mail";
	}
	return $error;
}
?>