<?php
include_once('conncet.php');
$empid=$_GET['edit_id'];
$cid=$_GET['edit_cid'];
$bid=$_GET['edit_bid'];
$tdateaa=date("Y-m-d");


if(isset($_POST['search']))
{
	$ename=$_POST['ffname'];
	$contactno=$_POST['contactno'];
	$empid=$_POST['ida'];
$query = mysql_query ("SELECT * FROM emplyee where efname='$ename' || empid='$empid' || econtact='$contactno'"); 
	while($idsh = mysql_fetch_array($query))
 {
	$empid= $idsh['empid'];
	$fname=$idsh['efname'];
	$address=$idsh['eaddress'];
	$bdate=$idsh['ebdate'];
	$contactno=$idsh['econtact'];
	$eemail=$idsh['eemailid'];
	$designation=$idsh['edesignation'];
	
 }

}

if(isset($_POST['save']))
{	
	$empid=$_POST['empid'];
	$tdate=$_POST['date'];
	$qty=$_POST['qty'];
	$sewingrate=$_POST['sewrate'];
	$billid=$_POST['billid'];

mysql_query("insert into empwork(eidw,tdatew,qtyw,sewingratew,billid) values ('$empid','$tdate','$qty','$sewingrate',$billid)");
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Search Employee</title>
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
    <div class="lastvmarg"><a href="empdashboard.html">
    
    <img src="images/backtodashboard.png"></a>
    </div>
    <br><br>
      <h4><font color="#f15a29" face="Arial, Helvetica, sans-serif">  Search Employee</font></h4>
  <form method="POST" action="" > 
  <center>


<table>
  <thead>
        <tr>
         <th width="20%" height="30" bgcolor="#e4f8ff"><font color="#000">Select Name</font></th>
        <th width="20%" bgcolor="#e4f8ff"><font color="#000">Emp Id</font> </th>
   <th width="20%" bgcolor="#e4f8ff"><font color="#000">Contact No</font></th>
<th width="8%" bgcolor="#fff">&nbsp;</th>
 
   
     </tr>
</thead>
   
    <tr >
     <td data-label="Name" bgcolor="#FFFFFF">
     <input type="text" class="intext" name="ffname" list="datalist1">
     <datalist id="datalist1">
     
	 <?php
        $sql = "SELECT * FROM emplyee  WHERE 1";
        $query = mysql_query($sql);
		$cnt=1;
        while($rs = mysql_fetch_object($query))
{ 
		$RES=stripslashes($rs->efname);
		//echo "<option value='$RES'> $RES </option>"; 
		echo '<option value="'.$RES.' '.$RAS.'">'.$RES.' '.$RAS.'</option>';
		  $cnt++;
		
		}
     ?>
     </td>
     <td data-label="Cust Id" bgcolor="#FFFFFF">
      <input type="text" class="intext" name="ida">
      </td>
      <td data-label="Contact No" bgcolor="#FFFFFF">
      <input type="text" class="intext" name="contactno">
      </td>
    <td bgcolor="#FFFFFF">
    <input type="submit" name="search" class="sbut" value="Show">
    </td>

    </tr>
    
</table>


  <br>
   <hr size="1" color="#f15a29">   
      <table>
     
      <tr> 
     
       
       <td width="10%" bgcolor="#ffffff"><font color="#f15a29"><strong>Emp ID</strong></font> </td>
       <td width="8%" ><input type="text" class="intext" name="empid" value="<?php echo $empid ?>"></td>
       <td width="8%" bgcolor="#ffffff"><font color="#f15a29"><strong>Emp Name</strong></font> </td>
       <td width="27%"><input type="text" class="intext" name="ename" value="<?php echo $fname ?> <?php echo $lname ?>"></td>
       <td width="10%" bgcolor="#ffffff"><font color="#f15a29"><strong>Cont No</strong></font> </td>
       <td width="15%"><input type="text" class="intext" name="F Name" value="<?php echo $contactno ?>"></td>
        <td width="10%" bgcolor="#ffffff"><font color="#f15a29"><strong>Designation</strong></font> </td>
       <td width="15%"><input type="text" class="intext" name="F Name" value="<?php echo $designation ?>"></td>
       <td width="10%"><a href="emphistory.php?edit_id=<?php echo $empid;?>"><img src="images/pay.png" width="60" height="40"></a></td>
      </tr>
      </table>
      
</center>
      <hr size="1" color="#f15a29">
      <div class="lastvmarg">
      <p><strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Date :-</font></strong>
    <input type="date" name="date" class="outtext" value="<?php echo $tdateaa ?>"> </div>
       <br><br>
<div id="bdiv">
      <table>
  <thead>
    <tr>
<th width="20%" height="30" bgcolor="#b9eeff"><font color="#535455">Quantity</font>  </th>
<th width="20%" bgcolor="#b9eeff"><font color="#535455"> Sewign Rate</font></th>
   <th width="25%" bgcolor="#b9eeff"><font  color="#535455">Bill Id</font></th>
   </tr>

</thead>
    <tr>
<td data-label="F Name" class="tdbg" ><input type="text" name="qty" value="" class="intext"></td>
<td data-label="M Name" class="tdbg"><input type="text" name="sewrate" value="" class="intext"></td>
<td  data-label="L Name" class="tdbg"><input type="text" name="billid" value="" class="intext"></td>
    </tr>
    </table>
    </div>
    <br>
    <center>
    <input type="submit" value=" Save " name="save" class="sbut">
    </center>
    <br>
    <center>
    
</center>
     
    </form>
 </section>
  </header>
</body>
</html>