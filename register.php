<?php
include "dbconnect.php";

@session_start();


if(isset($_POST['submit'])){
    $email = $_POST['f_email'];
    $name=$_POST['f_name'];
    $username=$_POST['f_username'];
    $password=$_POST['f_password'];

    $phone=$_POST['f_phone'];

    $sql = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
    $result=$conn->query($sql);
	
	$arr=$result->fetch_assoc();

    if($arr!=NULL){
		$sql = "SELECT * FROM users WHERE email = '$email' ";
       $result=$conn->query($sql);
	
	   $arr=$result->fetch_assoc();
	   if($arr!=NULL){
		   echo "Email already exists";
	   }
	   else{
		echo "Your username has to have unique identification !";
	   }


       
    }else{
        $sql = "INSERT INTO users (ID, name, username, email, phone,password) 
		VALUES ( NULL,'$name', '$username', '$email','$phone','$password')";

		
		if($conn->query($sql))
		{
			$_SESSION["email"] = "$email";
		    $_SESSION["password"] = "$password";
			header('location:index.php');
			// echo "welcome ";
			
		}
		else
		{
			echo "registration failed";
		}
		
		
		$conn->close();
        
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<body>	
	<center>
		<h1> Registration  </h1>
		<form method="POST" action="register.php">
			<label>Name</label>
			<input type="text" placeholder="Enter name" name="f_name" required> <br> <br>
			<label>username</label>
			<input type="text" placeholder="username" name="f_username" required> <br> <br>
			<label>email</label>
			<input type="email"  placeholder="email " name="f_email" required > <br> <br>
			<label>password</label>
			<input type="password"  placeholder="enter password " name="f_password"required > <br> <br>
			<label>Phone</label>
			<input type="text"  placeholder="Enter phone no. " name="f_phone" required> <br> <br>
			
			<input type="submit" name='submit' value="Register">
		</form>

		Don't have an account?<a href="login.php">Login </a> 
	</center>	
	
</body>
</html>