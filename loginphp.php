<?php
  session_start();
  if($_POST["uname"]=='sajidmk2002'){
  	if($_POST["psw"]=='sajidmk'){
  		$_SESSION['valid']=true;
      echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/adminPanel.php";
        </script>';
  	}
  	else{
  		echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/adminLogin.php";
           window.alert("Invalid Password");
		</script>';
  	}
  }
  else{
  	echo '<script type="text/javascript">
           window.location = "http://localhost/inventory/adminLogin.php";
           window.alert("Wrong Username and Password");
      	</script>';
  }
?>