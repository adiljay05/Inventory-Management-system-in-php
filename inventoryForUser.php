<!DOCTYPE html>
<html>
<head>
	<title>Inventory</title>
</head>
<style type="text/css">
	table{
		text-align: center;
	}
	table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;
  margin: 5%;
}

table td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4c73af;
  color: white;
}

	th{
		color :white;
		background-color: #4c73af;
	}

	.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4c73af;
  color: white;
}
</style>
<body>
	<div class="topnav">
      <a href="home.php"style="background-color: red;">back</a>
  		<a class="active" href="inventoryForUser.php">Item Details</a>
	</div>

	<?php
$con = mysqli_connect("localhost","jawam","1126","data");

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo "<table>";
echo "<th>Item ID</th><th>Item Name</th><th>Company Price</th><th>Profit Percentage</th><th>Quantity Remaining</th>";
$sql = "SELECT * FROM Items;";
$result = mysqli_query($con,$sql);

if ($result->num_rows > 0) {
     //output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td>".$row["itemId"]."</td><td>" . $row["itemName"]. "</td><td>" . $row["companyPrice"]. "</td><td>"  . $row["profitPercentage"]. "</td><td>"  . $row["quantityRemaining"]. "</td></tr>";
    }
} else {
    echo "<tr><td>0 results</td></tr>";
}
$con->close();
echo "</table>";
?>
</body>
</html>
