<?php
include "dbconnect.php";



$name=$_POST['f_name'];
$description=$_POST['f_description'];
$price=$_POST['f_price'];
$quantity=$_POST['f_quantity'];

echo $name,$description,$price,$quantity;

$sql = "INSERT INTO product (ID, Name,Description,Purchase_price,Quantity) 
		VALUES (NULL,'$name', '$description', '$price','$quantity')";

		
		if($conn->query($sql))
		{
			header('location:index.php');
			//echo "data inserted successfully";
			
		}
		else
		{
			echo "insertion failed";
		}
		
		
		$conn->close();
?>

