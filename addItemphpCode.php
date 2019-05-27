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

$itemName=$_GET["itemName"];
$companyPrice=$_GET["companyPrice"];
$profitPercentage=$_GET["profitPercentage"];
$quantityRemaining=$_GET["quantityRemaining"];

$q="insert into Items(itemName,companyPrice,profitPercentage,quantityRemaining) values('$itemName','$companyPrice','$profitPercentage','$quantityRemaining')";

if(mysqli_query($con,$q)){
	echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/inventory.php"
      </script>';
}
else echo "error occured";

?>