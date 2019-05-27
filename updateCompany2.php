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
	<title>Update Company</title>
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
      <a href="adminPanel.php"style="background-color: red;">back</a>
      <a href="company.php">Compnay Details</a>
      <a href="addNewCompany.php">Add new Compnay</a>
      <a class="active" href="updateCompany.php">Update Company</a>
      <a href="deleteCompany.php">Delete Company</a>
      <a href="logout.php" style="background-color: red; margin-left: 37%;">Log out</a>
  </div>

        <form action="updateCompanyphpCode.php">
	<table>
		<th >
			&nbsp;&nbsp;&nbsp;Provide Updated Item Information
		</th>
		<tr>
			<td style="padding: 5%;">
        <?php
            $companyId=$_GET["companyId"];
            $con = mysqli_connect("localhost","jawam","1126","data");

            // Check connection
            if (mysqli_connect_errno())
            {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $q="select companyId, companyName,companyAddress,companyPhoneNo from Company where companyId='$companyId'";
            $result=mysqli_query($con,$q);
            if ($result->num_rows > 0) {
              //output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<b>Company ID:&nbsp;&nbsp;</b>". "<font name=\"itemId\">".$row["companyId"]."</font>" .  "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Company Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["companyName"].  "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["companyAddress"].  "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>". $row["companyPhoneNo"];
              }
            }
            else{
              echo "No such Company exists";
              exit(0);
            }
            $con->close();
        ?>
        <table>
          <th >
            &nbsp;&nbsp;&nbsp;Company's new Information
          </th>
          <tr>
            <td style="padding: 5%;">
              <?php
                $_SESSION["companyId"]=$_GET["companyId"];
              ?>
              <b>Due Amount</b> <input type="text" name="companyDueMoney" required>
              <b>Paid Amount</b> <input type="text" name="companyPaidMoney" required>
              <b>Total Trade</b> <input type="text" name="companyTotalMoney" required>
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