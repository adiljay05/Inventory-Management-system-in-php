<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<style type="text/css">
		.img1{
			width:150px;
			height: 150px;
		}
		img:hover {
			background-color:#4c73af;
			border-radius: 100px; 
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
			</tr>
		</table>
	</div>

	<div class="body">
		<table style="width:100%;" ><tr>
		<td><a href="invoice.php"><img class="img1" src="invoice.png" ></a><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size: 25px;">Invoice</font></td>
		<td><a href="inventoryForUser.php"><img class="img1" src="inventory.png" ></a><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size: 25px;">Inventory</font></td>
		<td><a href="customerForUser.php"><img class="img1"  src="ledger.png"></a><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="font-size: 25px;">Ledger</font></td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><a href="adminLogin.php"><img class="img1" src="admin.png" ></a><br>&nbsp;&nbsp;&nbsp;<font style="font-size: 25px;">Administrator</font></td>
		</tr></table>
	</div>

</body>
</html>