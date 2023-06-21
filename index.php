<?php
	include "dbconnect.php";
	
	session_start();
	$s="SELECT * FROM product";
	$result=$conn->query($s);

	$email = $_SESSION["email"];
	$password = $_SESSION["password"];
	// echo $_SESSION["email"];

	if(empty($email) || empty ($password)){
		header("location:login.php");
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		table, td, th{
			border-collapse:collapse;
			border:2px solID blue;
		}
		table{
			wIDth:80%;
			margin: 0 auto;
		}
		td, th{
			padding:15px;
			text-align:center;
		}
		#logout{
			position:absolute;
			right:20px;

		}
		
	</style>
</head>
<body>	
<div ID="logout" >
	<?php echo "$email"  ?>	<a href="logout.php" >
		Logout  </a>
	
	
</div> 

	
		<center>
			<h1> product List</h1>
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Purchase_price</th>
					<th>Quantitiy</th>
					<th>EDIT</th>
					<th>Delete</th>
				</tr>
				<?php
				//$i=1;
				while($r = $result->fetch_assoc())
				{
					$IDd=$r['ID'];
					$nam=$r['Name'];
					$Description=$r['Description'];
					$Purchase_price=$r['Purchase_price'];
					$Quantity=$r['Quantity'];
					
					echo "<tr>";
						echo "<td>". $IDd . "</td>";
						echo "<td>". $nam . "</td>";
						echo "<td>". $Description . "</td>";
						echo "<td>". $Purchase_price . "</td>";
						echo "<td>". $Quantity . "</td>";
					
						echo "<td> <a href='editForm.php?edit_ID=$IDd'>Edit</a></td>";
						echo "<td> <a href='delete.php?del_ID=$IDd'>Delete</a></td>";
					echo "</tr>";
				}
				?>
				
				<tr>
					<td colspan="5"><a href="insertForm.php">Insert Record</a></td>
				</tr>
			</table>
		</center>
	
</body>
</html>




