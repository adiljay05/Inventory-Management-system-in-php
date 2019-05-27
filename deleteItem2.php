<?php
session_start();
  if($_SESSION["valid"]!=true){ 
      echo "<script>window.alert(\"you're not allowed to see the page.\")</script>";
      echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/inventory.php";
        </script>';
      exit(0);
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Item</title>
	<style>

	button {
  background-color: #4c73af;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

	input[type=text] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus {
  background-color: #ddd;
  outline: none;
}

	table{
		width: 90%;
		margin:5%;
		border: 1px solid black;
	}
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
</head>
<body>
	<div class="topnav">
      <a href="inventory.php"style="background-color: red;">back</a>
      <a href="inventory.php">Item Details</a>
      <a href="addNewItem.php">Add new Item</a>
      <a href="updateItem.php">Update Item</a>
      <a class="active" href="deleteItem.php">Delete Item</a>
      <a href="logout.php" style="background-color: red; margin-left: 52%;">Log out</a>
  </div>

        <form action="deleteItemphpCode.php">
	<table>
		<th >
			&nbsp;&nbsp;&nbsp;Provide Updated Item Information
		</th>
		<tr>
			<td style="padding: 5%;">
        <?php
            $itemId=$_GET["itemId"];
            $con = mysqli_connect("localhost","jawam","1126","data");

            // Check connection
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $q="select * from Items where itemId='$itemId'";
            $result=mysqli_query($con,$q);
            if ($result->num_rows > 0) {
              //output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<b>Item ID:&nbsp;&nbsp;</b>". "<font name=\"itemId\">".$row["itemId"]."</font>" .  "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Item Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["itemName"]."<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Compannyy Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["companyPrice"]."<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profit Percentage:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["profitPercentage"]."<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity Remaining:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["quantityRemaining"];
              }
            }
            else{
              echo "no such item exists";
              exit(0);
            }
            $con->close();
        ?>
        <?php
                $_SESSION["itemId"]=$_GET["itemId"];
              ?>
        <br><br>
        <button>Confirm Deletion</button>
        </form>
      </td>
		</tr>
	</table>


</body>
</html>