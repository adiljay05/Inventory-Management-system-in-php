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
$itemId=$_SESSION["itemId"];
$companyPrice=$_GET["companyPrice"];
$profitPercentage=$_GET["profitPercentage"];
$quantityRemaining=$_GET["quantityRemaining"];

$q="update Items set companyPrice='$companyPrice', profitPercentage='$profitPercentage', quantityRemaining='$quantityRemaining' where itemId='$itemId'";
mysqli_query($con, $q);

echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/inventory.php"
      </script>';
?>