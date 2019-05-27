var counter=1;
var count=0;

window.onload = function print_today() {
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").value = m + "/" + d + "/" + y;
  var dt = new Date();
  document.getElementById("time").value = dt.toLocaleTimeString();

      //alert("jawad adil");

      //var id = <?php echo json_encode($id); ?>;
      //var name = <?php echo json_encode($name); ?>;
      //var c_p = <?php echo json_encode($c_p); ?>;
      //var p_p = <?php echo json_encode($p_p); ?>;
     // for(var i=0;i<limit;i++)
    //  {
        //alert(id[i]);
        //alert(name[i]);
        //alert(c_p[i]);
        //alert(p_p[i]);
    //  }
      //alert(id);
      /*
      console.log(name);*/
}

//function checking for digits only in editbox(qty)
function calculate_price(evt)
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        document.getElementById("Editbox14").value=document.getElementById("Editbox14").value;
    }
    document.getElementById("Editbox14").value=document.getElementById("Editbox14").value+keyCode;
};

var sum1=0;
function calculate_profit()
{
  sum1=0;
    for(var i=1;i<counter;i++)
    {
      var pr="profit"+i;
      //alert(pr);
      var prft=document.getElementById(pr).value;
      sum1=parseFloat(sum1)+parseFloat(prft);
   
    }
    //alert(sum1);
    // sum1=0;
}
function update_val(qt,cp,pp,tp,p,pf,qtyr) 
{
  var value=document.getElementById(cp).value;  //getting company price
  var d_per=document.getElementById(pp).value;  //getting profit percentage
  var div=d_per/100.00;
  var val=value*div;      //calculating profit
  var t_p=parseFloat(val)+parseFloat(value);    //this will be the trade price
 
  //now calculating total price

  var qty=document.getElementById(qt).value;    //getting quantity
  var qtyR=document.getElementById(qtyr).value;
  //alert(qtyR);
  //alert(qty);

  if( parseInt(qty) > parseInt(qtyR) )
  {
    alert("Please Enter a valid quantity");
    return;
  }
   document.getElementById(tp).value=t_p.toFixed(2); //storing results into trade price
  var total_price=parseFloat(qty)*parseFloat(t_p);  
  document.getElementById(p).value=total_price.toFixed(2);   //setting the price value

  var profit=val*qty;   //calculating the total profit
  document.getElementById(pf).value=profit.toFixed(3);  //setting the total profit per item
  counter=counter+1;
   var sum=0;
   for(var i=1;i<counter;i++)
   {
      var id="Price"+i;
      //alert(id);
      var value=document.getElementById(id).value;
      sum=parseFloat(sum)+parseFloat(value);
      
   }  
   //alert(sum);
   document.getElementById("price_before_discount").value=sum.toFixed(2);
   calculate_profit();
   document.getElementById("total_profit").value=sum1.toFixed(2);
}

//neechy waly boxes sath jo karwai hai wo ye hai
function after_discount()
{
  var t_p_b_d=document.getElementById("price_before_discount").value;    //total price before discount
  var per=document.getElementById("discount_percentage").value;
  var div=per/100.00;
  var disc=t_p_b_d*div;
  var t_p_a_d=parseFloat(t_p_b_d)-parseFloat(disc);  //total price after discount
  document.getElementById("total_final_price").value=t_p_a_d.toFixed(2);
  document.getElementById("total_disount").value=disc.toFixed(2);
  var ttfp=document.getElementById("total_final_price").value;
  var arrs=document.getElementById('arrears').value;
  var sum=parseFloat(ttfp)+parseFloat(arrs);
  document.getElementById('grand_total').value=sum.toFixed(2);
  var total_profit1=sum1;
  var final_profit=total_profit1-disc;
 // alert(final_profit);
  document.getElementById('total_profit').value=final_profit.toFixed(2);
}


function MarginTopFunc(id) {
  //alert("jawad adil");
  var style = window.getComputedStyle(document.getElementById(id));
  var marginTop = style.getPropertyValue('margin-top'); 
  //alert(marginTop);
  marginTop.replace( 'px', "");
 // alert(marginTop);

}

function discounted()
{
  var discount=document.getElementById("total_disount").value;
  var mul=discount*100;
  var total_price=document.getElementById("price_before_discount").value;
  var percentage=mul/total_price;
  document.getElementById("discount_percentage").value=percentage.toFixed(2);
  var total=total_price-discount;
  document.getElementById("total_final_price").value=total.toFixed(2);
  var ttfp=document.getElementById("total_final_price").value;
  var arrs=document.getElementById('arrears').value;
  var sum=parseFloat(ttfp)+parseFloat(arrs);
  document.getElementById('grand_total').value=sum.toFixed(2);
  calculate_profit();
  var pf=sum1;
  //alert(pf);
  var pf11=parseFloat(pf)-parseFloat(discount);
  document.getElementById('total_profit').value=pf11.toFixed(2);
}


function add_row() {
  counter=counter+1;
  //alert(counter);
  var table = document.getElementById("Table1");
  var row = table.insertRow(counter);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);

  var first_part="<td><input type=\"text\" ";
  var f="<td><?php <br>\
   $server   = \"localhost\";<br> \
   $username = \"root\";<br>\
   $password = \"\"; <br>\
   $dbname   = \"test1\";<br> \
   $conn = new mysqli($server, $username, $password, $dbname);<br>\
   $sql = \"SELECT * From test1\";<br>\
   $results=mysqli_query($conn,$sql);<br>\
   echo \"<select name=\'name";

var l="\' id=\'name\' style=\'width:100%;height:33px;border:none;\'>\";<br>\
   echo \"<option value=\"--Select an Item--\"> --Select an option-- </option>\";<br>\
  while($row=mysqli_fetch_assoc($results))<br>\
  {<br>\
    $name=$row[\'name\'];<br>\
    echo \"<option value=\'\" . $row[\'name\'] .\"\'>\" . $row[\'name\'] .\"</option>\";<br>\
  }<br>\
  echo \"</select>\";<br>\
?><br>\
</td>";
  
alert(f);
  var item = first_part+"id=\"Itemid"+counter+"\" style=\"border:none;width: 90%;height:33px;\" name=\"id\"></td>";
  //alert(item);
  var name=f+counter+l;
  alert(name);
  var qty=first_part+"id=\"qty"+counter+"\" onblur=\"update_val()\" style=\"border:none; width: 90%\" name=\"qty\"></td>";
  //alert(qty);
  var trade_price=first_part+"id=\"trade_price"+counter+"\" style=\"border:none; width: 90%\" name=\"trade_price1\"></td>";
  //alert(trade_price);
  var price=first_part+"id=\"Price"+counter+"\" style=\"border:none; width: 90%\" name=\"Price\"></td>";
  //alert(price);
  cell1.outerHTML = item;
  cell2.outerHTML = name;
  cell3.outerHTML = qty;
  cell4.outerHTML = trade_price;
  cell5.outerHTML = price;

  var table = document.getElementById("Table2");
  var row = table.insertRow(-1);
  var cell6 = row.insertCell(0);
  var cell7 = row.insertCell(1);
  var cell8 = row.insertCell(2);
  var second_first="<td class=\"cell2\"><input type=\"text\" ";
  var profit=second_first+"id=\"profit"+counter+"\" style=\"border:none;width: 90px;height:33px;\" name=\"Profit_per_item\" value=\"\"></td>";
  //alert(profit);
  var Company_price=second_first+"id=\"Company_price"+counter+"\" style=\"border:none;width: 90px;\" name=\"Company_price\" value=\"\" ></td>";
  //alert(Company_price);
  var profit_percentage=second_first+"id=\"profit_percentage"+counter+"\" style=\"border:none;width: 110px;\" name=\"discount_percentage_per_item\" value=\"\"></td>";
  //alert(profit_percentage);
  cell6.outerHTML = profit;
  cell7.outerHTML = Company_price;
  cell8.outerHTML = profit_percentage;
//  document.getElementById("Table1").style="position:absolute;margin-top:900px;"
    //counter=counter+1;
    //alert(counter);
   // alert("jawad");

}
