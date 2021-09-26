<?php
include_once('conncet.php');
$bid=$_GET['edit_bid'];

if(isset($_POST['show']))
{
	$bid=$_POST['bid'];
	$name=$_POST['name'];
	$query = mysql_query ("SELECT * FROM delivery where billid='$bid' || name='$name'"); 
	while($dsh = mysql_fetch_array($query))
	{
	 $Cust_Id=$dsh['cid'];
	 $name=$dsh ['name'];
	 $bid=$dsh['billid'];
	 $odate=$dsh['orddate'];
	 $cid=$dsh['cid'];
	 $name=$dsh['name'];
	 //$bid=$dsh['bid'];
	 $odate=$dsh['orddate'];
	 $odate=date("d-m-Y", strtotime($odate));
	 $ddate=$dsh['devdate'];
	 $ddate=date("d-m-Y", strtotime($ddate));
	 $pants=$dsh['nopro'];
	 $amount=$dsh['billamount'];
	 $advance=$dsh['advance'];
	 $remaining=$amount-$advance;

	 }
	 //echo $name;
}

if(isset($_POST['save']))
{	
	
	$bid=$_POST['bid'];
	$paida=$_POST['paida'];
	$delvdatea=$_POST['delvdatea'];
	
	$sql = mysql_query ("UPDATE bill SET delvdate = '$delvdatea', paymat = '$paida' where billid='$bid'");



mysql_query("delete from  delivery where billid='$bid'");

    $cid="";
	$name="";
	$contact="";
	$bid="";
	$odate="";
	$ddate="";
	$pants="";
	$shirts="";
	$other="";
	$suit="";
	$amount="";
	$advance="";
	$remaining="";
	$delvdate="";
	$paid="";
	
	}
	


$tdateaa=date("Y-m-d");

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Delivery</title>
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
  <td bgcolor="#fefdf2"><img src="images/logo.PNG" width="80"></td>
  <td bgcolor="#fefdf2"><font color="#023386" size="+2" class="text"><strong>Tailor Application </strong></font></td>
  <td bgcolor="#fefdf2"><img src="images/cname3.png" width="200"></td>
  </tr>
  </table> 
  </center>
    <br><div class="lastvmarg"><a href="Dashboard.html">
    
    <img src="images/backtodashboard.png"></a>
    </div>
    <center>
      <h2><font color="#f15a29" face="Arial, Helvetica, sans-serif"> Delivery</font></h2>
</center>
<center>
 <form method="POST" action="" >
<div id="tablesize">
 <table>
     <tr>
      <th height="30">Bill Id</th>
     <th height="30">Customer Name</th>
     <th>Contact No</th>
     <th width="15%"></th>
     </tr>
     <tr>
     <td width="20%"><input type="text" name="bid" value="<?php echo $bid ?>"  class="intext"></td>
     <td width="20%">
     <select class="intext" name="name">
          <option>--None--</option>
	 <?php
        $sql = "SELECT distinct name  FROM  bill  WHERE 1";
        $query = mysql_query($sql);
		$cnt=1;
        while($rs = mysql_fetch_object($query))
{ 
		$RES=stripslashes($rs->name);
		
	
		//echo "<option value='$RES'> $RES </option>"; 
		echo '<option value="'.$RES.'">'.$RES.' '.$RAS.'</option>';
          $cnt++;
		
		}
     ?>
  
     </select>
     </td>
     <td width="20%"><input type="text" name="todate" value="" class="intext" ></td>
     <td width="10%"><input name="show" type="submit"  class="sbut" value="Show"></th>
     </tr>
     </table>
     </div>
     </form>
</center>
<form method="POST" action="" >
<center>
<div id="tablesize">
   <hr size="1" color="#f15a29">   
      <table>
       <?php
  $query = mysql_query ("SELECT contactno FROM customers where id='$Cust_Id'");
 	while($idsh = mysql_fetch_array($query))
	{
	$cno=$idsh['contactno'];
	}
	 ?>
      <tr> 

       <td width="8%" bgcolor="#ffffff"><font color="#f15a29"><strong>Cust ID</strong></font> </td>
       <td width="15%" ><input type="text" class="intext" name="cid" value="<?php echo $Cust_Id?>"></td>
       <td width="8%" bgcolor="#ffffff"><font color="#f15a29"><strong>Name</strong></font> </td>
       <td width="20%"><input type="text" class="intext" name="name" value="<?php echo $name?>"></td>
       <td width="8%" bgcolor="#ffffff"><font color="#f15a29"><strong>Conat No</strong></font> </td>
       <td width="15%"><input type="text" class="intext" name="contact" value="<?php echo $cno?>"></td>
      </tr>
      </table>
      
      <hr size="1" color="#f15a29">
      </div>
</center>
<table>
  <thead>
        <tr>
        <th width="10%" height="30" bgcolor="#b9eeff"><font color="#f15a29">Bill Id</font>  </th>
  
   <th width="10%" bgcolor="#b9eeff"><font  color="#f15a29">Date</font></th>
   <th width="10%" bgcolor="#b9eeff"><font  color="#f15a29">D Date</font></th>
   <th width="10%" bgcolor="#b9eeff"><font color="#f15a29">No Of Iteams</font></th>
   <th width="10%" bgcolor="#b9eeff"><font color="#f15a29">Amount</font></th>
   <th width="10%" bgcolor="#b9eeff"><font color="#f15a29">Advance</font></th>
   <th width="10%" bgcolor="#b9eeff"><font color="#f15a29">REMAINING </font></th>
 </tr>
   
   
</thead>
   
      <?php
  //$query = mysql_query ("SELECT amount, advance, balance, ddate FROM billdata where bid='$bid'");
 //	while($idsh = mysql_fetch_array($query))
	//{
	///	$amount=$idsh['amount'];
		//$balance=$idsh['balance'];
		//$advance=$idsh['advance'];
		//$ddate=$idsh['ddate'];
	//}
	 ?>
    <tr >
 <td height="30" data-label="F Name" ><input type="text" class="intext" name="bid" value="<?php echo $bid ?>"></td>
      <td  data-label="Address">
<input type="text" class="intext" name="odate" value="<?php echo $odate ?>"></td>
      <td  data-label="B Date"><input type="text" class="intext" name="ddate" value="<?php echo $ddate ?>"></td>
       <?php
// $query = mysql_query ("SELECT sum(quantity) as pq, sum(amount) as pa FROM  billdata where bid='$bid' && stype='Pant'");
 	//while($idsh = mysql_fetch_array($query))
	//{
	//$qpant=$idsh['pq'];
	//$apant=$idsh['pa'];
	//}
	 ?>
      <td data-label="Contact No " ><input type="text" class="intext" name="pants" value="<?php echo $pants ?>"></td>
 
       <td  data-label="E-Mail id"> <input type="text" class="intext" name="amount" value="<?php echo $amount  ?>"></td>
       <td  data-label="E-Mail id">
	   <input type="text" class="intext" name="advance" value="
	   <?php echo $advance ?>"></td>
       <td  data-label="E-Mail id">
	   <input type="text" class="intext" name="remaining" value="
	   <?php echo $remaining ?>"></td>

    </tr>
    </table>
<center>
 
<p><strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">
Date:-  <input type="text" name="delvdatea" class="outtext" value="<?php echo $tdateaa ?>">
&nbsp;
Paying :-</font></strong> 
        <input type="text" name="paida" class="outtext" value=""> 
        &nbsp;&nbsp; <input name="save" type="submit"  class="sbut" value="Save">
        </center>
        </form>
    </section>
  </header>
</body>
</html>