<?php
include_once('conncet.php');
$empid=$_GET['edit_id'];
//$bid=$_GET['edit_id'];
$tdateaap=date("Y-m-d");


if(isset($_POST['savesal']))
{	
	$empida=$_POST['empida'];
	$fd=$_POST['fd'];
	$td=$_POST['td'];
	$salamt=$_POST['salamt'];
	$psal=$_POST['psal'];
	$tdateaap=date("Y-m-d");

mysql_query("insert into empsal(empid,fdate,todate,paydate,samount,spayamount) values ('$empida','$fd','$td','$tdateaap','$salamt','$psal')");

}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Customer History</title>
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
  <td bgcolor="#fefdf2"><font color="#023386" size="+2" class="text"><strong>Employee Management </strong></font></td>
  <td bgcolor="#fefdf2"><img src="images/cname3.png" width="200"></td>
  </tr>
  </table>

    <br>
    <div class="lastvmarg"><a href="Searchemployee.php"><img src="images/backtodashboard.png"></a>
    </div>
      <h3><font color="#f15a29" face="Arial, Helvetica, sans-serif">    History</font></h3>
      </center>
      
           <form action="" method="POST">
       <center>
   <hr size="1" color="#f15a29">
   <?php
  $query = mysql_query ("SELECT * FROM emplyee where empid='$empid'"); 
	while($idsh = mysql_fetch_array($query))
	{
	$empid= $idsh['empid'];
	$efname= $idsh['efname'];
	$econtact= $idsh['econtact'];
	$edesignation= $idsh['edesignation'];
	 }
	 ?>  
      <table>

      <tr> 
       <td width="10%" bgcolor="#ffffff"><font color="#f15a29"><strong>Emp ID</strong></font> </td>
       <td width="10%" ><input type="text" class="intext" name="empida" value="<?php echo $empid ?>"></td>
       <td width="10%" bgcolor="#ffffff"><font color="#f15a29"><strong>Name</strong></font> </td>
       <td width="20%"><input type="text" class="intext" name="F Name" value="<?php echo $efname ?> <?php echo $lname ?>"></td>
       <td width="10%" bgcolor="#ffffff"><font color="#f15a29"><strong>Conat No</strong></font> </td>
       <td width="15%"><input type="text" class="intext" name="F Name" value="<?php echo $econtact ?>"></td>
        <td width="10%" bgcolor="#ffffff"><font color="#f15a29"><strong>Designation</strong></font> </td>
       <td width="15%"><input type="text" class="intext" name="F Name" value="<?php echo $edesignation ?>"></td>
      </tr>
  
      </table>
      <br>
 
      </center> 
      <center>
      <div id="tablesize">

 <table>
     <tr>
     <th height="30">From Date</th>
     <th>To Date</th>
     <th width="15%"></th>
     </tr>
     <tr>
     <td width="20%"><input type="date" name="fromdate" value="" class="intext"></td>
     <td width="20%"><input type="date" name="todate" value="" class="intext" ></td>
     <td width="10%"><input name="showo" type="submit"  class="sbut" value="Show"></th>
     </tr>
    </table>
 
  </div>
  </center>
  
  <br>
      <table>
  <thead>
        <tr>
   <th width="25%" bgcolor="#b9eeff"><font color="#535455"> Date</font> </th>
  <th  bgcolor="#b9eeff"><font  color="#535455">Quantity</font></th>
    <th  bgcolor="#b9eeff"><font  color="#535455">sewingrate</font></th>
    <th bgcolor="#b9eeff"><font  color="#535455">Amount</font></th>
   </tr>
   
   
</thead>
   <?php 
  if(isset($_POST['showo']))
{
	$todate=$_POST['todate'];
	$todatea = date("d-m-Y", strtotime($todate));
	$fromdate=$_POST['fromdate'];
	$fromdatea = date("d-m-Y", strtotime($fromdate));
	$empid=$_POST['empida'];
	

	$query = mysql_query ("SELECT * from empwork where tdatew>= '$fromdate' && tdatew<= '$todate' && eidw='$empid' order by tdatew asc "); 
	while($idsh = mysql_fetch_object($query))
	{
	$odate=($idsh->tdatew);
	$odate = date("d-m-Y", strtotime($odate));
	$ddate=($idsh->ddate);
	$ddate = date("d-m-Y", strtotime($ddate));
	
	//$bid=($idsh->bid);
	$amtw =($idsh->sewingratew)*($idsh->qtyw);

	//echo $dddate;
	// echo $id;

		?>
    <tr>
      <td data-label="M Name" class="tdbg"><?php echo ($idsh->tdatew) ?></td>
      <td  data-label="Address" class="tdbg"><?php echo ($idsh->qtyw) ?></td>
      <td  data-label="B Date" class="tdbg"><?php echo ($idsh->sewingratew) ?></td>
      <td  data-label="B Date" class="tdbg"><?php echo $amtw ?></td>
    </tr>
    <?php 
$totalamount +=$amtw;
		}
   }
?>
</table>
<br/>
<center>
<font face="Arial, Helvetica, sans-serif">From Date:</font><input type="text" class="outtext" name="fd" value="<?php echo $fromdatea  ?>"> &nbsp;&nbsp; 
<font face="Arial, Helvetica, sans-serif">Todate:</font><input type="text" class="outtext" name="td" value="<?php echo $todatea ?>">
<font face="Arial, Helvetica, sans-serif">Salary Amount :</font> <input type="text" class="outtext" name="salamt" value="<?php echo $totalamount ?>">&nbsp;&nbsp;
<font face="Arial, Helvetica, sans-serif">Paying Amount :</font><input type="text" class="outtext" name="psal" value="">
<br><br>



    

<center>

<input type="submit" name="savesal" value=" Save " class="sbut">
</form>
<hr size="1" color="#f15a29">
    <br>
    <p></p>
    <p></p>
    <center>
    <font face="Arial, Helvetica, sans-serif" color="#f15a29" size="4"><p><strong>Salary Paid Details</strong></p></font></center>
    <input name="showo" type="submit" value="Show Details">
    <p></p>
    <table>
    <thead>
    <tr>
    <th bgcolor="#fefdf2" height="25">From Date</th>
    <th bgcolor="#fefdf2">To Date</th>
    <th bgcolor="#fefdf2">Salary Paid Date </th>
    <th bgcolor="#fefdf2">Salary Amount </th>
    <th bgcolor="#fefdf2">Salary Paid Amount </th>
    </tr>
   </thead>
   <?php 
	$empid=$_POST['empida'];
	$query = mysql_query ("SELECT * from empsal where empid='$empid'"); 
	while($idsh = mysql_fetch_object($query))
	{
		$paydate=($idsh->paydate);
	$paydate = date("d-m-Y", strtotime($paydate));
		?>
    <tr>
    <td><?php echo ($idsh->fdate) ?></td>
    <td><?php echo ($idsh->todate) ?></td>
    <td><?php echo $paydate ?></td>
    <td><?php echo ($idsh->samount) ?></td>
    <td><?php echo ($idsh->spayamount) ?></td>
    </tr>
    <?php
	
}
	?>
    </table>
 </section>
  </header>
</body>
</html>