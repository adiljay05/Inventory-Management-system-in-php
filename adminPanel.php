<?php
	session_start();
  if($_SESSION["valid"]!=true){	
  		echo "<script>window.alert(\"you're not allowed to see the page.\")</script>";
  		echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/adminLogin.php";
      	</script>';
  		exit(0);
 	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style type="text/css">
		button {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
			width: 100%;
		}

		/* Add a hover effect for buttons */
		button:hover {
			opacity: 0.8;
		}
		.cancelbtn {
			width: auto;
			padding: 10px 18px;
			background-color: #f44336;
		}
		img:hover {
			background-color:#4c73af;
			border-radius: 100px; 
		}
		.button1 {
			background-color: #4c73af;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 20px;
		}

		.button1 {
 			color: white;
			border: 2px solid #4c73af; /* Green */
		}
		.header{
			color: white;
			background-color: #4c73af;
		}
		.body{
			margin:5%;
			padding: 5%;
			border: 2px solid #4c73af;
		}
	</style>
</head>
<body>
	<div class="header">
		<table>
			<tr>
				<td style="width:10%;  background-color: white;"><img src="logo.png" style="width:100%;"></td>
				<td><font  style="font-size: 60px;">&nbsp;Software Name</font><br>
				<font style="font-size: 20px;"><i>&nbsp;&nbsp;&nbsp;&nbsp;we facilitate your business</i></font></td>
				<td><a href="logout.php"><button type="button" class="cancelbtn">Log out</button></a></td>
			</tr>
		</table>
	</div>

	<div class="body">
		<a href="inventory.php"><button class="button1">Inventory</button></a><br><br>
		<a href="customer.php"><button class="button1">Ledgers</button></a><br><br>
		<a href="company.php"><button class="button1">Company Ledgers</button></a>
	</div>

</body>
</html>