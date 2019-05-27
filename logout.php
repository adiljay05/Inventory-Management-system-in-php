<?php
	session_start();
	unset($_SESSION["uname"]);
	unset($_SESSION["psw"]);
	unset($_SESSION["valid"]);

	echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/adminLogin.php";
      	</script>';
?>
echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/inventory.php";
      	</script>';
