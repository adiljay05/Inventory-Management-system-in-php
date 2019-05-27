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
$companyId=$_SESSION["companyId"];

$q="delete from Company where companyId='$companyId'";
if(mysqli_query($con, $q)){
echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/company.php"
      </script>';
  }
  else echo "error occured";
?>