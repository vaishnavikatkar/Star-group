
<?php
include_once('conncet.php');
$id=$_GET['edit_id'];
$fname=$_GET['fname'];
$contactno=$_GET['contactno'];
$billno=$_GET['edit_bid'];
$t=date("h:i:sa");
$tdateaa=date("Y-m-d");
$query=mysql_query("select billno from barbills");
	$billno=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($billno<$idsh['billno'])
	$billno=$idsh['billno'];
	}
	$billno++;
	
	$query = mysql_query ("SELECT srno FROM barbilldetails where billid='$billno' order by srno asc"); 
	while($ids = mysql_fetch_array($query))
	{
	$srno= $ids['srno'];
	}
	$srno+=1;
	//echo $srno;
	
if(isset($_POST['submit']))
{
	$barcodea=$_POST['barcodea'];
	$query = mysql_query ("SELECT * FROM barcode where barcodeno='$barcodea'"); 
	while($dshb = mysql_fetch_array($query))
	{
	 $ratea=$dshb['rate'];
	 $typea=$dshb['type'];
	}
	//echo $barcodea;
	//echo $ratea;
	//echo  $typea;
}
	
	
	
	
	if(isset($_POST['add']))
{	
	$billno=$_POST['billno'];
	$barcode=$_POST['barcodea'];
	$type=$_POST['type'];
	$ratrprm=$_POST['ratrprm'];
	$quantity=$_POST['quantity'];
	//$sgst=$_POST['sgst'];
	//$cgst=$_POST['cgst'];
	$productname=$_POST['productname'];

mysql_query("insert into barbilldetails(srno,billid,barcode,type,rateprm,qty,productname) values ('$srno','$billno','$barcode','$type','$ratrprm','$quantity','$productname')");

  $query = mysql_query ("SELECT * FROM barbilldetails where barcode='$barcode'"); 
	while($dshb = mysql_fetch_array($query))
	{
	 $qtya +=$dshb['qty'];
	}
	

	$query = mysql_query ("SELECT * FROM barcode where barcodeno='$barcode'"); 
	while($dshb = mysql_fetch_array($query))
	{
	 $usedqtya=$dshb['usedqty'];
	}
	echo $qtya;
	$upqtyab = $usedqtya+$quantity;
	
	$sql = mysql_query ("UPDATE barcode SET usedqty = '$upqtyab' where barcodeno ='$barcode'");

$query=mysql_query("select billno from barbills");
	$billno=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($billno<$idsh['billno'])
	$billno=$idsh['billno'];
	}
	$billno++;

}

$select=$_POST['select'];
if(isset($_POST['delete']))
{	

	for($j=0;$j<count($select);$j++)
{
 $billid=($select[$j]-$select[$j]%100)/100;
	 $barcode=$select[$j]%100;
$query = mysql_query ("SELECT * FROM barbilldetails where billid='$billno' && barcode='$barcode'"); 
}

echo $barcode;

for($i=0;$i<count($select);$i++)
{
 $billid=($select[$i]-$select[$i]%100)/100;
	 $srno=$select[$i]%100;
mysql_query ("delete from barbilldetails where billid='$billno' && srno='$srno'"); 

}

echo $barcode;
}



if(isset($_POST['savebill']))
{	
	$billno=$_POST['billno'];
	$bdate=$_POST['bdate'];
	$btime=$_POST['btime'];
	$tqty=$_POST['srnos'];
	$billamount=$_POST['amount'];
	$discount=$_POST['discount'];
	$discountamt=($billamount*$discount)/100;
	$finalamount=$billamount-$discountamt;
	$cname=$_POST['cname'];
	$ccont=$_POST['ccont'];
	$billnob=$_POST['billnob'];
mysql_query("insert into barbills(billno,bdate,btime,tqty,billamount,discount,discountamt,finalamount,cname,ccont,pavtino) values ('$billno','$bdate','$btime','$tqty','$billamount','$discount','$discountamt','$finalamount','$cname','$ccont','$billnob')");

}


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Billing Process</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Six Revisions">
  <meta name="description" content="How to use the CSS background-size property to make an image fully span the entire viewport."> 
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <header class="container">
    <section class="content">
    <center>
   <table>
  <tr>
  <td bgcolor="#fefdf2"><img src="images/FINAL.png" width="70" ></td>
  <td bgcolor="#fefdf2"><font color="#023386" size="+2" class="text"><strong>Gowardhan Tailor</strong></font></td>
  <td bgcolor="#fefdf2"><img src="images/cname3.png" width="200"></td>
  </tr>
  </table> 
    <br><div class="lastvmarg"><a href="Main Dashboard.html">
    <img src="images/backtodashboard.png"></a>
    </div>
      <h3><font color="#f15a29" face="Arial, Helvetica, sans-serif">Billing Process</font></h3>
      <form method="POST" action="" > 
	 <hr size="1" color="#f15a29">
      </center>
<br> 
<div class="ffleft">
<strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Bill Id :- </font></strong>
<input type="text" name="billno" class="outtext" value="<?php echo $billno ?>">
<strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Date :-</font></strong> 
        <input type="date" name="bdate" class="outtext" value="<?php echo $tdateaa ?>">
        
        <strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Time :-</font></strong> 
        <input type="text" name="btime" class="outtext" value="<?php echo $t ?>">
        </div>
        
        <p> 
        </p>
        <table>
     
      <tr> 

       <td width="8%" bgcolor="#ffffff"><font color="#f15a29"><strong>Cust ID</strong></font> </td>
       <td width="8%" ><input type="text" class="intext" name="CustId" value="<?php echo $id ?>"></td>
       <td width="8%" bgcolor="#ffffff"><font color="#f15a29"><strong>Name</strong></font> </td>
       <td width="20%"><input type="text" class="intext" name="name" value="<?php echo $fname ?>&nbsp <?php echo $lname ?>"></td>
       <td width="8%" bgcolor="#ffffff"><font color="#f15a29"><strong>Conat No</strong></font> </td>
       <td width="12%"><input type="text" class="intext" name="Contact No" value="<?php echo $contactno ?>"></td>
        
      </tr>
      </table>
        <br>
      <table>
        <thead>
        <tr>
        <th width="20%" height="25" bgcolor="#e6f9ff">Barcode</th>
   <th width="20%" bgcolor="#e6f9ff">Type</th>
   <th width="20%" bgcolor="#e6f9ff">Rate 1m</th>
   <th width="25%" bgcolor="#e6f9ff">Quantity</th>
   <th width="25%" bgcolor="#e6f9ff">Product Name</th>
   <th width="10%" bgcolor="#e6f9ff"></th>
   </tr>
   
   
</thead>
    <tr >
<td data-label="F Name" ><input type="text" class="intext" name="barcodea" autofocus value="<?php echo $barcodea ?>"></td>
<td data-label="M Name" ><input type="text" class="intext" name="type" value="<?php echo $typea ?>"></td>
<td  data-label="L Name"><input type="text" class="intext" name="ratrprm" value="<?php echo $ratea ?>"></td>
<td  data-label="B Date"> <input type="text" class="intext" value="" name="quantity"></td>
<td  data-label="Product Name"> 
<select class="intext" name="productname">
<option >Raymond</option>
<option >Siyaram</option>
<option >Linen</option>
<option >Cotvilla</option>
<option >Arvind</option>
<option >Sollino</option>
<option >Geza</option>
<option >Redentailar</option>
<option >O.C.M.</option>
<option >Denesh</option>
<option >Grashim</option>
<option >Cotton</option>
<option >Poster</option>
<option >Combo Pack</option>
</select>
</td>
<td  data-label="B Date"> <input type="submit" name="submit" value="Show Details" /></td>
  </tr>
  </table>
  <br>
  <center>
  <input name="add" type="submit" value="Add Product">
  </center>
<center>
<hr size="1" color="#f15a29">
<input type="submit" name="delete" class="sbrright" value="Delete Selected">
<table>
<tr>
<th width="5%" height="25">Sr. No</th>
<th width="20%" height="25">Product Name</th>
<th width="20%">Type</th>
<th width="20%">Barcode</th>
<th width="20%">Rate 1M</th>
<th width="15%">Qty</th>
<th width="20%">Amount</th>
<th width="5%"></th>
</tr>
<?php 
//$sql12 = "SELECT * FROM billdetails where bid='$bid' && type='$typenames'";

      $sql12 = "SELECT * FROM barbilldetails where billid='$billno' order by srno";
      $query1 = mysql_query($sql12);
      while($rs2 = mysql_fetch_object($query1)){ 
	  $taxamt=($rs2->rateprm)*($rs2->qty);
		?>

<tr>
<td><input type="text" class="intext" name="srnos" value="<?php echo($rs2->srno)?>"></td>
<td><input type="text" class="intext" name="barcode" value="<?php echo($rs2->productname)?> "></td>
<td><input type="text" class="intext" name="noofshirt" value="<?php echo($rs2->type)?> "></td>
<td><input type="text" class="intext" name="barcode" value="<?php echo($rs2->barcode)?> "></td>
<td><input type="text" class="intext" name="rate" value="<?php echo($rs2->rateprm)?> "></td>
<td><input type="text" class="intext" name="amount" value="<?php echo($rs2->qty)?> "></td>
<td><input type="text" class="intext" name="amount" value="<?php echo $taxamt ?> "></td>
<td><input type="checkbox" name="select[]" value="<?php echo ($rs2->billid)*100+($rs2->srno) ?>" ></td>
</tr>

<?php 
	$amountto +=$taxamt;

		}
?>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td><strong>Total</strong></td>
<td><input type="text" class="intext" name="amount" value="<?php echo $amountto ?> "></td>
<td></td>
</tr>
</table>

<br>
</center>
<p></p>
<div class="ffleft">
<strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">
Name:-
<input type="text" name="cname" class="outtext" value=""> &nbsp;&nbsp;&nbsp;&nbsp;
Contact:-<input type="text" name="ccont" class="outtext" value="">&nbsp;&nbsp;&nbsp;&nbsp;
Discount %:-</strong> 
      <input type="text" name="discount" class="outtext" value="">
      &nbsp;&nbsp;&nbsp;&nbsp;
<strong>Bill Book No:-</strong>
      <input type="text" name="billnob" class="outtext" value=""></font>
</div>
<br><br><br>
<center>
 
  <input name="savebill" type="submit" value="Save Bill">
  
 <a href="billprint.php?edit_bid=<?php echo $billno;?>" class="nmclickaa">Print Bill</a>
  </form>
</center>
 </section>
  </header>
</body>
</html>