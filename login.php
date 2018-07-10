<?php

 include("db-connection.php");

session_start();

$error="";
if(isset($_POST['login'])){
	if (empty($_POST['uname']) || empty($_POST['pass'])) 
	{
		$error = "Username or Password is invalid";
	}

	else
	{
		$username=$_POST['uname'];
		$password=$_POST['pass'];

		// To protect MySQL injection for Security purpose
				$username = stripslashes($username);
				$password = stripslashes($password);
				$username = mysqli_real_escape_string($conn,$username);
				$password = mysqli_real_escape_string($conn,$password);

//==========ADMIN SIGNIN===========//
	
		if($username=="pmsadmin")
		{
					$query=mysqli_query($conn,"SELECT * from login_users where username='$username' AND password='$password'");
					$rows = mysqli_num_rows($query);
					if($rows==1)
					{
						$_SESSION['login_user']=$username; // Initializing Session
						header("location: admin_pms.php"); // Redirecting To Other Page
					}

					else 
					{
						$error = "Username or Password is invalid";
					}

		}

//========HIGHER OFFCIAL AND STAFF LOGIN ELSE PART===========//
		else
		{
				//================DEAN PRINCIPAL LOGIN====================//
				if($username=="secedean" || $username=="seceprincipal")
				{
					$query=mysqli_query($conn,"SELECT * from login_users where username='$username' AND password='$password'");
					$rows = mysqli_num_rows($query);
					if($rows==1)
					{
						$_SESSION['login_user']=$username; // Initializing Session
						header("location: checklogin.php"); // Redirecting To Other Page
					}

					else 
					{
						$error = "Username or Password is invalid";
					}

				}

			
			//======================STAFF LOGIN================//
				else
				{
					$query=mysqli_query($conn,"SELECT * from login_users where username='$username' AND password='$password'");
					$rows = mysqli_num_rows($query);
					if($rows==1)
					{
						$_SESSION['login_user']=$username; // Initializing Session
						header("location: checkstaff.php"); // Redirecting To Other Page
					}

					else 
					{
						$error= "Username or Password is invalid";
					}
				}
		}

	}

}

?>