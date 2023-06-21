<?php 
session_start();

$email = 	$_SESSION["email"];
$password = $_SESSION["password"];


if(empty($email) || empty ($password)){
	header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<body>	
	<center>
		<h1>Insert Form</h1>
		<form method="POST" action="insertData.php">
			<label>Name</label>
			<input type="text" placeholder="Enter name" name="f_name" required> <br> <br>
			<label>Description</label>
			<input type="text" placeholder="Description" name="f_description" required> <br> <br>
			<label>Current price</label>
			<input type="text" placeholder="Current Price" name="f_price" required> <br> <br>
			<label>Quantity</label>
			<input type="text" placeholder="Quantity" name="f_quantity" required> <br> <br>
			
			<input type="submit" value="INSERT">
		</form>
	</center>	
	
</body>
</html>