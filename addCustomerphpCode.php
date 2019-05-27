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
<?php
$con = mysqli_connect("localhost","jawam","1126","data");

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$customerName=$_GET["customerName"];
$address=$_GET["address"];
$phoneNo=$_GET["phoneNo"];
$dueMoney=$_GET["dueMoney"];
$paidMoney=$_GET["paidMoney"];
$totalTrade=$_GET["totalTrade"];

echo $_GET["customerName"];
echo $_GET["address"];
echo $_GET["phoneNo"];
echo $_GET["dueMoney"];
echo $_GET["paidMoney"];
echo $_GET["totalTrade"];

$q="insert into customer(customerName,customerAddress,customerPhoneNo,customerDueMoney,customerPaidMoney,customerTotalMoney) values('$customerName','$address','$phoneNo','$dueMoney','$paidMoney','$totalTrade')";

if(mysqli_query($con,$q)){
	echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/customer.php"
      </script>';
}
else echo "error occured";

?>