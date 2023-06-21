<?php
include "dbconnect.php";

session_start();

// if (session_status() === PHP_SESSION_ACTIVE) {	header("location:index.php");}

// $email = 	$_SESSION["email"];
// $password = $_SESSION["password"];
// // echo $_SESSION["email"];

// if(!empty($email) && !empty($password)){
// 	header("location:index.php");
// }

if(isset($_POST['submit'])){
    $email = $_POST['f_email'];
    $password=$_POST['f_password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password '  ";
    $result=$conn->query($sql);
	
	$arr=$result->fetch_assoc();
	
	

    if($arr==NULL){
		$sql = "SELECT * FROM users WHERE email = '$email' ";
		$result=$conn->query($sql);
		$arr=$result->fetch_assoc();
		if($arr == NULL){
			echo "No  user exists with this email";
		}
		else{
			echo "password is incorrect";
		}


    }else{
		$_SESSION["email"] = "$email";
		$_SESSION["password"] = "$password";

     
			header('location:index.php');
			echo "welcome ";
			
	}
	$conn->close();

}



?>



<!DOCTYPE html>
<html lang="en">
<body>	
	<center>
		<h1> Log In  </h1>
		<form method="POST" action="login.php">
		
			<label>email</label>
			<input type="email"  placeholder="email " name="f_email" required > <br> <br>
			<label>password</label>
			<input type="password"  placeholder="password " name="f_password" required > <br> <br>
			<input type="submit" name="submit"  value="Login">
		</form>

		Don't have an account?<a href="register.php">Register </a> 
	</center>	
	
</body>
</html>