<!doctype html>
<html>
<head>
		<?php
   $server   = "localhost"; 
   $username = "jawam";
   $password = "1126"; 
   $dbname   = "data"; 
   $conn = new mysqli($server, $username, $password, $dbname);
   $sql = "SELECT * From Items";
   $results=mysqli_query($conn,$sql);
   $num_rows = mysqli_num_rows($results);


   $id=array();
   $name=array();
   $c_p=array();
   $p_p=array();
   $q_r=array();

   for($i=0;$i<$num_rows;$i++)
   {
     $sql = "SELECT * From Items where Itemid=$i+1";
     $results=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($results))
     {
        $id[$i]=$row['itemId'];
        $name[$i]= $row['itemName'];
        $c_p[$i]=$row['companyPrice'];
        $p_p[$i]=$row['profitPercentage'];
        $q_r[$i]=$row['quantityRemaining'];
     }
   //    echo $id[$i]." ";
   //    echo $name[$i]." ";
   //    echo $c_p[$i]." ";
   //    echo $p_p[$i]."<br/>";
    }

/*
      echo $id[0]." ";
      echo $name[0]." ";
      echo $c_p[0]." ";
      echo $p_p[0]."<br/>";
      echo $id[1]." ";
      echo $name[1]." ";
      echo $c_p[1]." ";
      echo $p_p[1]."<br/>";
      echo $id[2]." ";
      echo $name[2]." ";
      echo $c_p[2]." ";
      echo $p_p[2]."<br/>";*/
      //echo $q_r;
      mysqli_close($conn);

   $server   = "localhost"; 
   $username = "jawam";
   $password = "1126"; 
   $dbname   = "data"; 
   $conn1 = new mysqli($server, $username, $password, $dbname);
   $sql1 = "SELECT * From Customer";
   $results1=mysqli_query($conn1,$sql1);
   $num_rows1 = mysqli_num_rows($results1);
   //echo $num_rows1;



   $c_id=array();
   $c_name=array();
   $address=array();
   $phone=array();
   $arrears=array();
   $paid=array();
   $total=array();


	//for($i=0;$i<$num_rows1;$i++)
   //{
   $i=0;
     $sql1 = "SELECT * From Customer ";//where customerId=$i+1";
     $results1=mysqli_query($conn1,$sql1);
     while($row=mysqli_fetch_assoc($results1))
     {
        $c_id[$i]=$row['customerId'];
        $c_name[$i]= $row['customerName'];
        $address[$i]=$row['customerAddress'];
        $phone[$i]=$row['customerPhoneNo'];
        $arrears[$i]=$row['customerDueMoney'];
        $paid[$i]=$row['customerPaidMoney'];
        $total[$i]=$row['customerTotalMoney'];
         $i=$i+1;
     }
     //}
     // echo $c_id[0]."<br>";
     // echo $c_name[0]."<br>";
     // echo $address[0]."<br>";
     // echo $phone[0]."<br>";
     // echo $arrears[0]."<br>";
     // echo $paid[0]."<br>";
     // echo $total[0]."<br>";
		//echo $c_name[0];

     mysqli_close($conn1);

  ?>
 	<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

/*the container must be positioned relative:*/
.autocomplete {
  
  display: inline-block;
}


.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  
  border-bottom: none;
  border-top: none;
  float: top;
  width: 200px;
  margin-left: -1000px;
  margin-top: -60px;
  /*position the autocomplete items to be the same width as the container:*/
  z-index: -1000000;
  margin-left: 0px;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  margin-left: -720px;
  width: 170px;
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
 	<script type="text/javascript">
  	var limit=<?php echo json_encode($num_rows); ?>;
    var id1 = new Array();
    var name=new Array();
    var c_p=new Array();
    var p_p= new Array();
    var q_r=new Array();

    var limit_2=<?php echo json_encode($num_rows1); ?>;
    var c_ID=new Array();
    var c_Name=new Array();
    var address=new Array();
    var phone=new Array();
    var arrears=new Array();
    var paid=new Array();
    var total1=new Array();

    function id_enable()
    {
        for(var i=1;i<19;i++)
        {
          var name="Itemid"+i;
          document.getElementById(name).disabled=false;
          var naaaaam="qty"+i;
          document.getElementById(naaaaam).disabled=false;
        }
        
        
    }
    function load()
    { 
       id1 = <?php echo json_encode($id); ?>;
       name = <?php echo json_encode($name); ?>;
       c_p = <?php echo json_encode($c_p); ?>;
       p_p = <?php echo json_encode($p_p); ?>;
       q_r = <?php echo json_encode($q_r); ?>;
       c_ID= <?php echo json_encode($c_id); ?>;
       c_Name= <?php echo json_encode($c_name); ?>;
       address= <?php echo json_encode($address); ?>;
       phone= <?php echo json_encode($phone); ?>;
       arrears= <?php echo json_encode($arrears); ?>;
       paid= <?php echo json_encode($paid); ?>;
       total1= <?php echo json_encode($total); ?>;
       // alert(id1);
       // // alert(c_ID);
        //alert(c_Name[0]);
       for(var i=0;i<c_Name.length;i++)
       {
       		c_Name[i]=c_Name[i].toLowerCase();
       }
       // alert(c_Name[0]);
       // alert(address);
       // alert(phone);
       // alert(arrears);
       // alert(paid);
       // alert(total1);
      document.getElementById('hide').hidden=false;
      document.getElementById('show').hidden=true;
      //alert(id1[0]);
    }
    function addcustomer()
    {
    	var naaam=document.getElementById('customer_name').value;
    	var a= c_Name.indexOf(naaam);
    	if(a<0)
    	{
    		alert("customer not found");
        document.getElementById('arrears').value=0;
    		return;
    	}
    	//alert(a);
    	document.getElementById('customer_id').value=c_ID[a];
      document.getElementById('customer_id1').value=c_ID[a];
    	document.getElementById('phone').value=phone[a];
    	document.getElementById('address').value=address[a];
    	document.getElementById('arrears').value=arrears[a];
    	//document.getElementById('paid').value=paid[a];
    	//document.getElementById('customer_id').value=
    }
	var button_count=2;
  function load_name(id,i_d,cp,pp,qr)
  {
    //alert("jawad adil");
    var x = document.getElementById(id).selectedIndex;
    //alert(x-1);
    //var c_p_1="Company_price"+x;
    //alert(c_p_1);
    //var p_p_1="profit_percentage"+x;
    //alert(id);
    //alert(i_d);	
    //alert(cp);
    //alert(pp);
    //var i_d="Itemid"+x;
    //alert(id1[x-1]);
    var b_id="non-printable"+button_count;
    var p_b_id="non-printable"+(button_count-1);
    var qt="qty"+(button_count-1);
    //alert(qt);
    //alert(p_b_id);
    document.getElementById(b_id).hidden=false;
    document.getElementById(qt).disabled=false;
    if(b_id!='non-printable1')
    	document.getElementById(p_b_id).hidden=true;
    document.getElementById(i_d).value=id1[x-1];
    document.getElementById(cp).value=c_p[x-1];
    document.getElementById(pp).value=p_p[x-1];
    document.getElementById(qr).value=q_r[x-1];
    button_count=button_count+1;
    
  }

  </script>
<meta charset="utf-8">
<title>Untitled Page</title>
<link href="index.css" rel="stylesheet">
<style type="text/css">
	.button1
	{
	   border: 1px solid #2E6DA4;
	   border-radius: 4px;
	   background-color: #3370B7;
	   background-image: none;
	   color: #FFFFFF;
	   font-family: Arial;
	   font-weight: normal;
	   font-size: 13px;
	   margin: 0;
	}
</style>
<script src="./js.js"></script>
<style type="text/css">
    @media print
    {
        #non-printable { display: none; }
        #non-printable1 { display: none; }
        #non-printable2 { display: none; }
        #non-printable3 { display: none; }
        #non-printable4 { display: none; }
        #non-printable5 { display: none; }
        #non-printable6 { display: none; }
        #non-printable7 { display: none; }
        #non-printable8 { display: none; }
        #non-printable9 { display: none; }
        #non-printable10 { display: none; }
        #non-printable11 { display: none; }
        #non-printable12 { display: none; }
        #non-printable13 { display: none; }
        #non-printable14 { display: none; }
        #non-printable15 { display: none; }
        #non-printable16 { display: none; }
        #non-printable17 { display: none; }
        #non-printable18 { display: none; }
        #printable { display: block; }
        select 
        {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			border: none; /* If you want to remove the border as well */
			background: none;
		}
    button{
      display:none;
    }
    }
    </style>
</head>
<body>
	<form  action="invoiceSave.php">
  <input type="button" class="button1" id="show" value="Start Invoice" style="position: absolute;width: 200px;height: 50px;margin-top: 20%;margin-left: 40%;"onclick="load()">
	<div hidden id="hide">
	<!-- Top wala company slogan +name-->
	<div id="printable">
	<header>
		
		<div style="position:absolute;left:40px;top:6px;width:102px;height:94px;z-index:10;">
		<img src="images/img0001.png" id="Shape1" alt="" style="width:102px;height:94px;"></div>
		<div id="wb_Text1" style="position:absolute;left:170px;top:32px;width:335px;height:42px;z-index:11;">
		<span style="color:#000000;font-family:Arial;font-size:37px;">Company Name</span></div>
		<div id="wb_Text2" style="position:absolute;left:170px;top:84px;width:251px;height:16px;z-index:24;">
		<span style="color:#000000;font-family:Arial;font-size:13px;">Slogan</span></div>
	</header>
	<hr style="margin-top: 110px;margin-left:40px;width:654px;border-color: #000000;border-bottom-width: 3px;">
		<!-- Invoice name sy address tak fields -->
		<input type="button" class="button1" id="non-printable" style="margin-left: 140px; height: 30px;width: 100px;" value="Add Customer" onclick="addcustomer()">
		<label for="date"style="margin-left: 115px;">Date : </label>
			<input type="text" id="date" style="height: 20px;font-size: 13px;width: 100px;" readonly name="date">
		<label for="time" style="">Time :</label>
			<input type="text" id="time" style="width: 140px;height: 20px;font-size: 13px;" readonly name="time"><br/>
      <input type="button" id="non-printable" class="button1" value="New Invoice" style="position:absolute;left:872px;top:188px;width:105px;height:25px;" onclick="document.location.reload()">
    
	
  	<label for="customer_id" style="margin-left: 40px;margin-top: 10px;">Customer ID :</label>
			<input type="text" id="customer_id" style="width: 70px;margin-top: 10px;height: 20px;font-size: 13px;" name="customer_id1">
		<label for="customer_name" style="margin-top: 10px;">Customer Name :</label>
			<input type="text" id="customer_name" style="width: 160px;margin-top: 10px;height: 20px;font-size: 13px;" name="customer_name">

			<script type="text/javascript">
		function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }

  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
//var countries = ["111","222","333"];
var countries = <?php echo json_encode($c_name); ?>;
//alert(countries);
//var countries= new Array();
      

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("customer_name"), countries);
</script>






		<label for="phone" style="margin-top: 10px;">Phone #</label>
			<input type="text" id="phone" style="width: 120px;margin-top: 10px;height: 20px;font-size: 13px;" name="Phone"> <br/>
		<label for="phone" style="margin-left: 40px; margin-top: 10px;">Address : </label>
			<input type="text" id="address" style="margin-top: 15px;width: 585px;height: 20px;font-size: 13px;" align="left" name="address">
		<hr style="margin-top: 20px;margin-left:40px;width:654px;border-color: #000000;border-bottom-width: 3px;">
	</div>





	<div id="non-printable">

		
		<input type="button" class="button1" value="Print Invoice" style="position:absolute;left:750px;top:800px;width:200px;height:40px;" onclick="window.print()">
		<label style="position:absolute;left:720px;top:720px;width:200px;height:40px;">Total Profit :</label>
		<input type="text" id="total_profit" style="font-size:20px;font-weight:900;color:green;position:absolute;left:820px;top:710px;width:150px;height:25px;">
	
  	
		<table style="margin-left: 700px;width: 360px;margin-top:0px;position: absolute;" id="Table2">
			<tr>
			<td class="cell0"><span style="font-size:13px;height: 19px;"> Profit</span></td>
			<td class="cell1"><span style="font-size:13px;"> Company Price</span></td>
			<td class="cell1"><span style="font-size:13px;"> Profit Percentage</span></td>
			<td class="cell1"><span style="font-size:13px;"> Remaining Quantity</span></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit1" style="border:none;width: 90px;height:17px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price1" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage1" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr1" style="border:none;width: 150px;" name="qtyr1" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit2" style="border:none;width: 90px;height:19px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price2" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage2" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr2" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit3" style="border:none;width: 90px;height:19px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price3" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage3" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr3" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit4" style="border:none;width: 90px;height:18px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price4" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage4" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr4" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit5" style="border:none;width: 90px;height:18px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price5" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage5" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr5" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit6" style="border:none;width: 90px;height:19px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price6" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage6" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr6" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit7" style="border:none;width: 90px;height:19px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price7" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage7" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr7" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit8" style="border:none;width: 90px;height:19px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price8" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage8" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr8" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit9" style="border:none;width: 90px;height:18px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price9" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage9" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr9" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit10" style="border:none;width: 90px;height:18px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price10" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage10" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr10" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit11" style="border:none;width: 90px;height:18px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price11" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage11" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr11" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit12" style="border:none;width: 90px;height:18px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price12" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage12" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr12" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit13" style="border:none;width: 90px;height:19px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price13" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage13" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr13" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit14" style="border:none;width: 90px;height:19px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price14" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage14" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr14" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit15" style="border:none;width: 90px;height:19px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price15" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage15" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr15" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit16" style="border:none;width: 90px;height:17px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price16" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage16" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr16" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit17" style="border:none;width: 90px;height:18px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price17" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage17" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr17" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
			<tr>
				<td class="cell2"><input type="text" disabled id="profit18" style="border:none;width: 90px;height:18px;" name="Profit_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="Company_price18" style="border:none;width: 90px;" name="Company_price" value="" ></td>
				<td class="cell3"><input type="text" disabled id="profit_percentage18" style="border:none;width: 110px;" name="discount_percentage_per_item" value=""></td>
				<td class="cell3"><input type="text" disabled id="qtyr18" style="border:none;width: 110px;" name="qtyr" value=""></td>
			</tr>
		</table>
	</div>
	<div id="printable">


		<!-- Pehla table yahan bany ga -->
		<table style="margin-left: 40px;" id="Table1">
			<tr>
				<td class="cell0"><span style="font-size:13px;"> Item ID</span></td>
				<td class="cell1"><span style="font-size:13px;"> Item Name</span></td>
				<td class="cell2"><span style="font-size:13px;">Quantity</span></td>
				<td class="cell3"><span style="font-size:13px;">Trade Price</span></td>
				<td class="cell4"><span style="font-size:13px;"> Price</span></td>
			</tr>
			<tr>
				<td style="width: 60px;"><input type="text" id="Itemid1" style="border:none;width: 60%;height:15px;" name="id1"></td>
				<td style="width: 400px;">
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name1' id='name11' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\"> </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?>
					<input type="button" class="button1" id="non-printable1" onclick="load_name('name11','Itemid1','Company_price1','profit_percentage1','qtyr1')" style="position: absolute;height: 3%;width:2%;float: left;">
						
				</td>
				<td><input type="text" id="qty1" disabled onblur="update_val('qty1','Company_price1','profit_percentage1','trade_price1','Price1','profit1','qtyr1')" style="border:none; width: 90%" name="qty1"></td>
				<td><input type="text" id="trade_price1" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price1" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid2" disabled style="border:none;width: 90%;height:15px;" name="id2"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name2' id='name22' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable2" hidden onclick="load_name('name22','Itemid2','Company_price2','profit_percentage2','qtyr2')" style="position: absolute;height: 3%;width:2%;float: right;">
				</td>
				<td><input type="text" id="qty2" disabled onblur="update_val('qty2','Company_price2','profit_percentage2','trade_price2','Price2','profit2','qtyr2')" style="border:none; width: 90%" name="qty2"></td>
				<td><input type="text" id="trade_price2" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price2" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid3" disabled style="border:none;width: 90%;height:15px;" name="id3"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name3' id='name33' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable3" hidden onclick="load_name('name33','Itemid3','Company_price3','profit_percentage3','qtyr3')" style="position: absolute;height: 3%;width:2%;float: right;">
				</td>
				<td><input type="text" id="qty3" disabled onblur="update_val('qty3','Company_price3','profit_percentage3','trade_price3','Price3','profit3','qtyr3')" style="border:none; width: 90%" name="qty3"></td>
				<td><input type="text" id="trade_price3" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price3" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid4" disabled style="border:none;width: 90%;height:15px;" name="id4"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name4' id='name44' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable4" hidden onclick="load_name('name44','Itemid4','Company_price4','profit_percentage4','qtyr4')" style="position: absolute;height: 3%;width:2%;float: right;">
				</td>
				<td><input type="text" id="qty4" disabled onblur="update_val('qty4','Company_price4','profit_percentage4','trade_price4','Price4','profit4','qtyr4')"style="border:none; width: 90%" name="qty4"></td>
				<td><input type="text" id="trade_price4" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price4" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid5" disabled style="border:none;width: 90%;height:15px;" name="id5"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name5' id='name55' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable5" hidden onclick="load_name('name55','Itemid5','Company_price5','profit_percentage5','qtyr5')" style="position: absolute;height: 3%;width:2%;float: right;">
				</td>
				<td><input type="text" id="qty5" disabled onblur="update_val('qty5','Company_price5','profit_percentage5','trade_price5','Price5','profit5','qtyr5')" style="border:none; width: 90%" name="qty5"></td>
				<td><input type="text" id="trade_price5" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price5" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid6" disabled style="border:none;width: 90%;height:15px;" name="id6"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name6' id='name66' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable6" hidden onclick="load_name('name66','Itemid6','Company_price6','profit_percentage6','qtyr6')" style="position: absolute;height: 3%;width:2%;float: right;">
				</td>
				<td><input type="text" id="qty6" disabled onblur="update_val('qty6','Company_price6','profit_percentage6','trade_price6','Price6','profit6','qtyr6')" style="border:none; width: 90%" name="qty6"></td>
				<td><input type="text" id="trade_price6" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price6" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid7" disabled style="border:none;width: 90%;height:15px;" name="id7"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name7' id='name77' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable7" hidden onclick="load_name('name77','Itemid7','Company_price7','profit_percentage7','qtyr7')" style="position: absolute;height: 3%;width:2%;float: right;">
				</td>
				<td><input type="text" id="qty7" disabled onblur="update_val('qty7','Company_price7','profit_percentage7','trade_price7','Price7','profit7','qtyr7')"style="border:none; width: 90%" name="qty7"></td>
				<td><input type="text" id="trade_price7" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price7" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid8" disabled style="border:none;width: 90%;height:15px;" name="id8"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name8' id='name88' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable8" hidden onclick="load_name('name88','Itemid8','Company_price8','profit_percentage8','qtyr8')" style="position: absolute;height: 3%;width:2%;float: right;">
				</td>
				<td><input type="text" id="qty8" disabled onblur="update_val('qty8','Company_price8','profit_percentage8','trade_price8','Price8','profit8','qtyr8')" style="border:none; width: 90%" name="qty8"></td>
				<td><input type="text" id="trade_price8" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price8" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid9" disabled style="border:none;width: 90%;height:15px;" name="id9"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name9' id='name99' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable9" hidden onclick="load_name('name99','Itemid9','Company_price9','profit_percentage9','qtyr9')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty9" disabled onblur="update_val('qty9','Company_price9','profit_percentage9','trade_price9','Price9','profit9','qtyr9')" style="border:none; width: 90%" name="qty9"></td>
				<td><input type="text" id="trade_price9" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price9" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid10" disabled style="border:none;width: 90%;height:15px;" name="id10"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name10' id='name1010' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable10" hidden onclick="load_name('name1010','Itemid10','Company_price10','profit_percentage10','qtyr10')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty10" disabled onblur="update_val('qty10','Company_price10','profit_percentage10','trade_price10','Price10','profit10','qtyr10')" style="border:none; width: 90%" name="qty10"></td>
				<td><input type="text" id="trade_price10" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price10" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid11" disabled style="border:none;width: 90%;height:15px;" name="id11"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name11' id='name1111' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable11" hidden onclick="load_name('name1111','Itemid11','Company_price11','profit_percentage11','qtyr11')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty11" disabled onblur="update_val('qty11','Company_price11','profit_percentage11','trade_price11','Price11','profit11','qtyr11')" style="border:none; width: 90%" name="qty11"></td>
				<td><input type="text" id="trade_price11" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price11" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid12" disabled style="border:none;width: 90%;height:15px;" name="id12"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name12' id='name1212' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable12" hidden onclick="load_name('name1212','Itemid12','Company_price12','profit_percentage12','qtyr12')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty12" disabled onblur="update_val('qty12','Company_price12','profit_percentage12','trade_price12','Price12','profit12','qtyr12')" style="border:none; width: 90%" name="qty12"></td>
				<td><input type="text" id="trade_price12" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price12" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid13" disabled style="border:none;width: 90%;height:15px;" name="id13"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name13' id='name1313' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable13" hidden onclick="load_name('name1313','Itemid13','Company_price13','profit_percentage13','qtyr13')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty13" disabled onblur="update_val('qty13','Company_price13','profit_percentage13','trade_price13','Price13','profit13','qtyr13')" style="border:none; width: 90%" name="qty13"></td>
				<td><input type="text" id="trade_price13" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price13" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid14" disabled style="border:none;width: 90%;height:15px;" name="id14"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name14' id='name1414' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable14" hidden onclick="load_name('name1414','Itemid14','Company_price14','profit_percentage14','qtyr14')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty14" disabled onblur="update_val('qty14','Company_price14','profit_percentage14','trade_price14','Price14','profit14','qtyr14')" style="border:none; width: 90%" name="qty14"></td>
				<td><input type="text" id="trade_price14" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price14" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid15" disabled style="border:none;width: 90%;height:15px;" name="id15"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name15' id='name1515' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable15" hidden onclick="load_name('name1515','Itemid15','Company_price15','profit_percentage15','qtyr15')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty15" disabled onblur="update_val('qty15','Company_price15','profit_percentage15','trade_price15','Price15','profit15','qtyr15')" style="border:none; width: 90%" name="qty15"></td>
				<td><input type="text" id="trade_price15" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price15" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid16" disabled style="border:none;width: 90%;height:15px;" name="id16"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name16' id='name1616' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable16" hidden onclick="load_name('name1616','Itemid16','Company_price16','profit_percentage16','qtyr16')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty16" disabled onblur="update_val('qty16','Company_price16','profit_percentage16','trade_price16','Price16','profit16','qtyr16')" style="border:none; width: 90%" name="qty16"></td>
				<td><input type="text" id="trade_price16" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price16" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid17" disabled style="border:none;width: 90%;height:15px;" name="id17"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name17' id='name1717' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable17" hidden onclick="load_name('name1717','Itemid17','Company_price17','profit_percentage17','qtyr17')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty17" disabled onblur="update_val('qty17','Company_price17','profit_percentage17','trade_price17','Price17','profit17','qtyr17')" style="border:none; width: 90%" name="qty17"></td>
				<td><input type="text" id="trade_price17" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price17" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr>
				<td><input type="text" id="Itemid18" disabled style="border:none;width: 90%;height:15px;" name="id18"></td>
				<td>
					<?php
						$server   = "localhost"; 
						$username = "jawam";
						$password = "1126"; 
						$dbname   = "data"; 
						$conn = new mysqli($server, $username, $password, $dbname);
						$sql = "SELECT * From Items
				";
						$i=0;
						$results=mysqli_query($conn,$sql);
						echo "<select name='name18' id='name1818' style='width:80%;border:none;float:left;'>";
						echo "<option value=\"--Select an Item--\">  </option>";
						while($row=mysqli_fetch_assoc($results))
						{
							$name=$row['itemName'];
							echo "<option value='" . $row['itemName'] ."\" id=\"name"."$i"."' >" . $row['itemName'] ."</option>";

							$i++;
						}
						echo "</select>";
					?><input type="button" class="button1" id="non-printable18" hidden onclick="load_name('name1818','Itemid18','Company_price18','profit_percentage18','qtyr18')" style="position: absolute;height: 3%;float: right;width: 2%;">
				</td>
				<td><input type="text" id="qty18" disabled onblur="update_val('qty18','Company_price18','profit_percentage18','trade_price18','Price18','profit18','qtyr18')" style="border:none; width: 90%" name="qty18"></td>
				<td><input type="text" id="trade_price18" disabled style="border:none; width: 90%" name="trade_price1"></td>
				<td><input type="text" id="Price18" disabled style="border:none; width: 90%" name="Price"></td>
			</tr>
			<tr style="padding-top: -25px; position: relative;">
				<td colspan="4" style="border:none;margin-top: -50px;position: inherit;">
					<label for="price_before_discount" style="margin-left: 340px;line-height: 25px;vertical-align: middle;">Price before discount :</label>
					<label for="discount_percentage" style="margin-left: 338px;line-height: 25px;vertical-align: middle;">Discount Percentage :</label>
					<label for="total_disount" style="margin-left: 280px;line-height: 25px;vertical-align: middle;">Total Dicount :</label>
					<label for="total_final_price" style="margin-left: 325px;line-height: 25px;vertical-align: bottom;">Total after Discount :</label>
					<label for="paid" style="margin-left: 240px;line-height: 25px;vertical-align: bottom;">Arrears :</label>
					<label for="grand_total" style="font-weight: 900;margin-left: 290px;line-height: 25px;vertical-align: bottom;">Grand Total :</label>
					<label for="paid" style="margin-left: 220px;line-height: 25px;vertical-align: bottom;margin-top: 100px;">Paid :</label>
						
				</td>
				<td style="border:none; height: 150px;float: right;margin-top: px;position: inherit;margin-bottom: 40px;">
					<input type="text" id="price_before_discount" name="price_before_discount" style="width: 120px;font-size: 13px;line-height: 25px;">
					<input type="text" id="discount_percentage" onblur="after_discount()" name="discount_percentage" style="width: 120px;font-size: 13px;line-height: 25px;">
					<input type="text" id="total_disount" onblur="discounted()" name="total_disount" style="width: 120px;font-size: 13px;line-height: 25px;">
					<input type="text" id="total_final_price" name="total_final_price" style="width: 120px;font-size: 13px;line-height: 25px;">
					<input type="text" id="arrears" name="arrears" style="color:red;width: 120px;font-size: 13px;line-height: 25px;">
          
  
					<input type="text" id="grand_total" name="grand_total" style="width: 120px;font-size: 13px;font-weight: 900;line-height: 25px;">
					<input type="text" id="paid" name="paid" onblur="id_enable()" style="width: 120px;margin-bottom: 30px;font-size: 13px;line-height: 25px;">
          <input type="text" id="customer_id1" hidden style="width: 70px;margin-top: 10px;height: 20px;font-size: 13px;" name="customer_id">
          <input type="submit" id="non-printable" class="button1" value="Save to ledgers" style="position:absolute;left:872px;top:155px;width:105px;height:25px;">
        </form>
				</td>
			</tr>
		</table>
	</div>
</div>
<!------------------------------------------------------------------------->



</body>
</html>