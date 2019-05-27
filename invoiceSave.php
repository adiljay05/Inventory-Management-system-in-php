<?php
	$customerId=$_GET["customer_id"];
	$grandTotal=$_GET["grand_total"];
	$paid=$_GET["paid"];
	$qty1=$_GET["qty1"];
	$qty2=$_GET["qty2"];
	$qty3=$_GET["qty3"];
	$qty4=$_GET["qty4"];
	$qty5=$_GET["qty5"];
	$qty6=$_GET["qty6"];
	$qty7=$_GET["qty7"];
	$qty8=$_GET["qty8"];
	$qty9=$_GET["qty9"];
	$qty10=$_GET["qty10"];
	$qty11=$_GET["qty11"];
	$qty12=$_GET["qty12"];
	$qty13=$_GET["qty13"];
	$qty14=$_GET["qty14"];
	$qty15=$_GET["qty15"];
	$qty16=$_GET["qty16"];
	$qty17=$_GET["qty17"];
	$qty18=$_GET["qty18"];
	$id_1=$_GET["id1"];
	$id_2=$_GET["id2"];
	$id_3=$_GET["id3"];
	$id_4=$_GET["id4"];
	$id_5=$_GET["id5"];
	$id_6=$_GET["id6"];
	$id_7=$_GET["id7"];
	$id_8=$_GET["id8"];
	$id_9=$_GET["id9"];
	$id_10=$_GET["id10"];
	$id_11=$_GET["id11"];
	$id_12=$_GET["id12"];
	$id_13=$_GET["id13"];
	$id_14=$_GET["id14"];
	$id_15=$_GET["id15"];
	$id_16=$_GET["id16"];
	$id_17=$_GET["id17"];
	$id_18=$_GET["id18"];
	

	if($customerId=="" && $customerId=="" && $grandTotal==""){
		echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/home.php";
      	</script>';
	}
	$con = mysqli_connect("localhost","jawam","1126","data");

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$q="select * from Customer where customerId='$customerId'";
	$result=mysqli_query($con,$q);
	$row = $result->fetch_assoc();

	$bill=intval($grandTotal)-intval($row["customerDueMoney"]);
	$totalnew=$row["customerTotalMoney"]+$bill;
	$dueNew=intval($grandTotal)-intval($paid);
	$paidNew=$totalnew-$dueNew;

	$q="update Customer set customerDueMoney='$dueNew',customerPaidMoney='$paidNew',customerTotalMoney='$totalnew' where customerId='$customerId'";

	if(mysqli_query($con,$q)){
		echo "updated";
	}
	else{
		echo "error";
		echo mysqli_errno($con);
	}
	for($i=0;$i<18;$i++)
	{
		$checkId = "id".($i+1);
		//echo $checkId;
		$checkQty = "qty".($i+1);
		if($_GET["$checkId"]!=''){
			$quan=$_GET["$checkQty"];
			$idn=$_GET["$checkId"];
			$qr="update Items set quantityRemaining=quantityRemaining-$quan where 
			ItemId='$idn'";
			mysqli_query($con,$qr);		
		}

	}
	$con->close();
	echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/home.php";
      	</script>';
  		
?>