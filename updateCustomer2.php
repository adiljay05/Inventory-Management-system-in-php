<?php
  session_start();

  if($_SESSION["valid"]!=true){ 
      echo "<script>window.alert(\"you're not allowed to see the page.\")</script>";
      echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/home.php";
        </script>';
      exit(0);
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Customer</title>
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
      <a href="customer.php"style="background-color: red;">back</a>
      <a href="customer.php">Customer Details</a>
      <a href="addNewCustomer.php">Add new Customer</a>
      <a class="active" href="updateCustomer.php">Update Customer</a>
      <a href="deleteCustomer.php">Delete Customer</a>
      <a href="logout.php" style="background-color: red; margin-left: 37%;">Log out</a>
  </div>

        <form action="updateCustomerphpCode.php">
	<table>
		<th >
			&nbsp;&nbsp;&nbsp;Provide Updated Item Information
		</th>
		<tr>
			<td style="padding: 5%;">
        <?php
            $customerId=$_GET["customerId"];
            $con = mysqli_connect("localhost","jawam","1126","data");

            // Check connection
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $q="select customerId, customerName,customerAddress,customerPhoneNo from Customer where customerId='$customerId'";
            $result=mysqli_query($con,$q);
            if ($result->num_rows > 0) {
              //output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<b>Customer ID:&nbsp;&nbsp;</b>". "<font name=\"itemId\">".$row["customerId"]."</font>" .  "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Item Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["customerName"].  "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["customerAddress"].  "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["customerPhoneNo"];
              }
            }
            else{
              echo "No such Customer exists";
              exit(0);
            }
            $con->close();
        ?>
        <table>
          <th >
            &nbsp;&nbsp;&nbsp;Customer's new Information
          </th>
          <tr>
            <td style="padding: 5%;">
              <?php
                $_SESSION["customerId"]=$_GET["customerId"];
              ?>
              <b>Due Amount</b> <input type="text" name="customerDueMoney" required>
              <b>Paid Amount</b> <input type="text" name="customerPaidMoney" required>
              <b>Total Trade</b> <input type="text" name="customerTotalMoney" required>
              <button href=>Update</button>
            </td>
          </tr>
        </table>
        </form>
      </td>
		</tr>
	</table>


</body>
</html>