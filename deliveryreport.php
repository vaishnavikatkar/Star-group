<?php
include_once('conncet.php');



if(isset($_POST['showd']))
{
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Orders</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Six Revisions">
  <meta name="description" content="How to use the CSS background-size property to make an image fully span the entire viewport."> 
  <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="code.js"></script>
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
  <td bgcolor="#fefdf2"></td>
  </tr>
  </table> 
  </center>
    <br><div class="lastvmarg"><a href="Dashboard.html">
    
    <img src="images/backtodashboard.png"></a>
    </div>
    <center>
      <h3><font color="#f15a29" face="Arial, Helvetica, sans-serif"> Delivary </font></h3>
</center>
<a href="dailyreport.php" class="nmclick" >Orders</a>
<div>
<form action="" method="POST">
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

<h3><font color="#f15a29" face="Arial, Helvetica, sans-serif"> Orders</font></h3>
<table>
  <thead>
        <tr>
        <th width="10%" height="30" bgcolor="#b9eeff"><font color="#f15a29">Delv Date</font> </th>
<th width="10%" height="30" bgcolor="#b9eeff"><font color="#f15a29">Bill Id</font> </th>
<th width="10%" height="30" bgcolor="#b9eeff"><font color="#f15a29">Cust Id</font> </th>
   <th width="20%" bgcolor="#b9eeff"><font color="#f15a29">Cust Name</font></th>
   <th width="10%" bgcolor="#b9eeff"><font  color="#f15a29">Date</font></th>
   <th width="10%" bgcolor="#b9eeff"><font  color="#f15a29">D Date</font></th>
  <th width="10%" bgcolor="#b9eeff"><font  color="#f15a29">No Of iteams</font></th>

   <th width="10%" bgcolor="#b9eeff"><font  color="#f15a29">Bill Amount</font></th>
   <th width="10%" bgcolor="#b9eeff"><font  color="#f15a29">Advance</font></th>
   <th width="10%" bgcolor="#b9eeff"><font  color="#f15a29">Paid Amount</font></th>
   
   </tr>
   
   
</thead>
<?php
if(isset($_POST['showo']))
{
	$todate=$_POST['todate'];
	//$todate = date("d-m-Y", strtotime($todate));
	$fromdate=$_POST['fromdate'];
	//$fromdate = date("d-m-Y", strtotime($fromdate));
	

	$query = mysql_query ("SELECT * from bill where delvdate>= '$fromdate' && delvdate<= '$todate' order by orddate asc "); 
	while($idsh = mysql_fetch_object($query))
	{
	$orddate=($idsh->orddate);
	$orddate = date("d-m-Y", strtotime($orddate));
	$devdate=($idsh->devdate);
	$devdate = date("d-m-Y", strtotime($devdate));
	$devdatela=($idsh->delvdate);
	$devdatela = date("d-m-Y", strtotime($devdatela));
	
	$bid=($idsh->billid);

	//echo $dddate;
	// echo $id;
	?>
   
   
    <tr >
     <td height="30" data-label="F Name" ><?php echo $devdatela ?></td>
 <td height="30" data-label="F Name" ><?php echo $bid ?></td>
  <td height="30" data-label="F Name" ><?php echo ($idsh->cid) ?></td>
      <td  data-label="L Name"><?php echo ($idsh->name) ?></td>
      <td  data-label="Address"><?php echo $orddate ?></td>
      <td  data-label="B Date"><?php echo $devdate ?></td>
      <td  data-label="L Name"><?php echo ($idsh->nopro) ?></td>
      <td  data-label="L Name"><?php echo ($idsh->billamount) ?></td>
      <td  data-label="L Name"><?php echo ($idsh->advance) ?></td>
      <td  data-label="L Name"><?php echo ($idsh->paymat)+ ($idsh->advance)?></td>
      
      
    </tr>
	<?php 
	
	$totamount+=($idsh->amount);
	$advanceamount+=($idsh->advance);
	$remainingamount+=($idsh->balance);
	}
}
	$todatea=$_POST['todate'];
	$todatea = date("d-m-Y", strtotime($todate));
	$fromdatea=$_POST['fromdate'];
	$fromdatea = date("d-m-Y", strtotime($fromdate));
	
?>

<input type="text" name="fdate" value="<?php echo $fromdatea ?>" class="outtext"> &nbsp;
<input type="text" name="fdate" value="<?php echo $todatea ?>" class="outtext">&nbsp;
<font face="Arial, Helvetica, sans-serif">Total Advance Amount:-</font> 
<input type="text" name="remaingss" value="<?php echo $advanceamount ?>" class="outtext" >
&nbsp;
    </table>
        <hr>
    </form>
</div>

    </section>
  </header>
</body>
</html>