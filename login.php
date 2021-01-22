<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
// @todo confirm if good practice to define function in if statement
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
	// @todo read on SQL Injection
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
		

		$result = mysqli_query($conn, $sql);
		//$result = pg_query($conn, $query);

		if (mysqli_num_rows($result)) {
			echo "Hello world\n" ;
			echo "   <a href='logout.php'>  Logout</a>";
		}
		
		else{
	header("Location: index.php? error=Wrong credentials");
	exit();
}
	}
	
}
