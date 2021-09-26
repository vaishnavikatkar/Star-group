<?php
include_once('conncet.php');
$id=$_GET['edit_id'];
$cid=$_GET['edit_cid'];
$bid=$_GET['edit_bid'];
$iteamid=$_GET['edit_itmid'];

//$fname=$_GET['fname'];
//$query=mysql_query("select * from customers");
	//$id=0;
	//while($idsh = mysql_fetch_array($query))
	//{
	//$id++;
	//}
	//$id++;
if(isset($_POST['submit']))
{	$id=$_POST['id'];
	$date=$_POST['orderdate'];
	$fname=$_POST['FName'];
	//$mname=$_POST['MName'];
	$lname=$_POST['LName'];
	$address=$_POST['Address'];
	$bdate=$_POST['B_Date'];
	$contactno=$_POST['Contact_No'];
	//$altcontactno=$_POST['AltContact_No'];
	$email=$_POST['E_Mail_id'];

mysql_query("insert into customers(id,date,fname,mname,lname,address,bdate,contactno,altcontactno,email) values ('$id','$date','$fname','$mname','$lname','$address','$bdate','$contactno','$altcontactno','$email')");
//echo $fname;

//echo $mname;
//echo $mname;
$query=mysql_query("select * from customers");
	$id=0;
	while($idsh = mysql_fetch_array($query))
	{
	$id++;
	}
	$id++;
	
	}


if(isset($_POST['search']))
{
	$id=$_POST['id'];
	$ffname=$_POST['ffname'];
	//echo $ffname;
	$fname = strtok($ffname, ' ');
	//echo strlen($fname);
	//$fname=SUBSTR($fname, 0, strlen($fname));
	$lname = strstr($ffname, ' ');
	$lname=SUBSTR($lname, 1, strlen($lname));
	//echo $fname;
	//echo $lname;
	//$lname="%".$lname."%";
	//$fname=$_POST['fname'];
	//$lname=$_POST['lname'];
	$contactno=$_POST['contactno'];
	$id=$_POST['ida'];
//$query = mysql_query ("SELECT * FROM customers where id='$id' || (fname='$fname' && 'lname='$lname')|| contactno='$contactno' || id='$ida' "); 
$query = mysql_query ("SELECT * FROM customers where lname='$lname' && fname='$fname' || id='$id' || contactno='$contactno' "); 
	while($idsh = mysql_fetch_array($query))
	{
	$id= $idsh['id'];
	$date=$idsh['date'];
	$fname=$idsh['fname'];
	$mname=$idsh['mname'];
	$lname=$idsh['lname'];
	$address=$idsh['address'];
	$bdate=$idsh['bdate'];
	$contactno=$idsh['contactno'];
	$altcontactno=$idsh['altcontactno'];
	$email=$idsh['email'];

	 }

	
	$query = mysql_query ("SELECT * FROM bill where cid='$id'"); 
	while($idsh = mysql_fetch_array($query))
	{
	$bid= $idsh['billid'];
	$odate=$idsh['orddate'];
	$odateaa=$idsh['orddate'];
	$odateaa = date("d-m-Y", strtotime($odateaa));
	$ddate=$idsh['devdate'];
	$ddateaa=$idsh['devdate'];
	$ddateaa = date("d-m-Y", strtotime($ddateaa));

	}

	 

	//}
}

//if(isset($_POST['search']))
//{
//	$id=$_POST['id'];
//	$query = mysql_query ("SELECT * FROM info where id='$id'"); 
	//while($idsh = mysql_fetch_array($query))
	//{
	//$id= $idsh['id'];
	//$name= $idsh['name'];
	//$uname= $idsh['uname'];
	//$password= $idsh['password'];
	
	// echo $idsh ['id'];
	//echo $idsh ['name'];
	 //echo $idsh ['uname'];
	// }
//}


if(isset($_POST['update']))
{
	$id= $_POST['id'];
	$date=$_POST['orderdate'];
	$fname=$_POST['FName'];
	//$mname=$_POST['MName'];
	$lname=$_POST['LName'];
	$address=$_POST['Address'];
	$bdate=$_POST['B_Date'];
	$contactno=$_POST['Contact_No'];
	//$altcontactno=$_POST['Address'];
	$email=$_POST['E_Mail_id'];
	
	$sql = mysql_query ("UPDATE customers SET date = '$date', fname = '$fname', mname = '$mname', lname = '$lname' , address = '$address' , bdate = '$bdate' , contactno = '$contactno' , email = '$email' where id='$id'");
	
		//echo $_POST['B_Date'];
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Search Customer</title>
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
  <td bgcolor="#fefdf2"><img src="images/logo.png" width="70" ></td>
  <td bgcolor="#fefdf2"><font color="#023386" size="+2" class="text"><strong>Gowardhan Tailor</strong></font></td>
  <td bgcolor="#fefdf2">&nbsp;</td>
  </tr>
  </table> 
    <br>
    <div class="lastvmarg"><a href="Dashboard.html">
    <img src="images/backtodashboard.png"></a></div>
      <h4><font color="#f15a29" face="Arial, Helvetica, sans-serif">  Search Customer</font></h4>
  <form method="POST" action="" > 
  <center>


<table>
  <thead>
        <tr>
         <th width="20%" height="30" bgcolor="#b9eeff"><font color="#000">Select Name</font></th>
        <th width="20%" bgcolor="#b9eeff"><font color="#000">Cust Id</font> </th>
   <th width="20%" bgcolor="#b9eeff"><font color="#000">Contact No</font></th>
<th width="8%" bgcolor="#fff">&nbsp;</th>
 
   
     </tr>
</thead>
   
    <tr >
     <td data-label="Name" bgcolor="#FFFFFF">
     <input type="text" class="intext" name="ffname" list="datalist1">
     <datalist id="datalist1">
     
	 <?php
        $sql = "SELECT * FROM customers  WHERE 1";
        $query = mysql_query($sql);
		$cnt=1;
        while($rs = mysql_fetch_object($query))
{ 
		$RES=stripslashes($rs->fname);
		$RAS=stripslashes($rs->lname);
	
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
     
       
       <td width="10%" bgcolor="#ffffff"><font color="#f15a29"><strong>Cust ID</strong></font> </td>
       <td width="8%" ><input type="text" class="intext" name="F Name" value="<?php echo $id ?>"></td>
       <td width="8%" bgcolor="#ffffff"><font color="#f15a29"><strong>Name</strong></font> </td>
       <td width="27%"><input type="text" class="intext" name="F Name" value="<?php echo $fname ?> <?php echo $lname ?>"></td>
       <td width="10%" bgcolor="#ffffff"><font color="#f15a29"><strong>Conat No</strong></font> </td>
       <td width="15%"><input type="text" class="intext" name="F Name" value="<?php echo $contactno ?>"></td>
       <td width="10%"><a href="history.php?edit_id=<?php echo $id;?>"><img src="images/history.png"></a></td>
      </tr>
      </table>
      
</center>
</form>
      <hr size="1" color="#f15a29">
<a href="neworder.php?edit_id=<?php echo $id;?>" class="nmclick">New Order</a>

      
      
      <div class="lastvmarg">
      <p><strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Last Order Date :-</font></strong>
        <input type="text" name="orderid" class="outtext" value="<?php echo $odateaa ?>"> </div>
       

      <table>
  <thead>
        <tr>
        <th width="20%" height="30" bgcolor="#b9eeff"><font color="#f15a29">Bill Id</font>  </th>
   <th width="20%" bgcolor="#b9eeff"><font color="#535455"> O Date</font> </th>
   <th width="20%" bgcolor="#b9eeff"><font color="#535455" >D Date</font></th>
   <th width="25%" bgcolor="#b9eeff"><font  color="#535455">Type</font></th>
    <th width="25%" bgcolor="#b9eeff"><font  color="#535455">Design Img</font></th>
    <th width="25%" bgcolor="#b9eeff"><font  color="#535455">Cloth Img</font></th> 
    <th width="25%" bgcolor="#b9eeff"><font  color="#535455">Iteam Id</font></th> 
    <th width="25%" bgcolor="#b9eeff"><font  color="#535455">View Img</font></th> 
   </tr>
   
   
</thead>
	<?php
	
	if(isset($_POST['search']))
{

    $query = mysql_query ("SELECT * FROM neworder where billid='$bid'"); 
	while($idsh = mysql_fetch_object($query))
	{
	  $iteamid=($idsh->barcode);
	  $clothimgm=($idsh->clothimg);
	  $designimgm=($idsh->designimg);
	  $a="climg/".$clothimgm;
	  $b="deimg/".$designimgm;
	?>
    <tr>
     <td data-label="F Name" class="tdbg" ><?php echo $bid ?></td>
      <td data-label="M Name" class="tdbg"><?php echo $odateaa ?></td>
      <td  data-label="L Name" class="tdbg"><?php echo $ddateaa ?></td>
      <td  data-label="Address" class="tdbg"><?php echo ($idsh->type) ?></td>
    
      <td  data-label="B Date" class="tdbg"><img src="<?php echo $a ?>" width="60" height="60"></td>
      <td  data-label="B Date" class="tdbg"><img src="<?php echo $b ?>" width="60" height="60"></td>
      <td  data-label="B Date" class="tdbg"><?php echo $iteamid ?></td>
      <td  data-label="B Date" class="tdbg"><a href="mdimg.php?edit_id=<?php echo $id;?>&edit_bid=<?php echo $bid;?>&edit_itmid=<?php echo $iteamid;?>"><img src="images/eye.png" width="35"></a></td>
    </tr>
    

    
 <?php

	}}
 ?>
  
    </table>
    <br>
    <center>
    
</center>
<hr size="1" color="#f15a29">

<!--
<div class="lastvmarg">
      <p><strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Last Delv Date :-</font></strong>
        <input type="text" name="orderid" class="outtext" value="<?php echo $ddelvdate?>"> </div>
<table>
  <thead>
        <tr>
        <th width="20%" height="30" bgcolor="#b9eeff"><font color="#535455">Bill Id</font>  </th>
   <th width="20%" bgcolor="#b9eeff"><font color="#535455"> Date</font> </th>
   <th width="20%" bgcolor="#b9eeff"><font color="#535455" >D Date</font></th>
   <th width="25%" bgcolor="#b9eeff"><font  color="#535455">Delv Date</font></th>
    <th width="25%" bgcolor="#b9eeff"><font  color="#535455">Pant</font></th>
    <th width="25%" bgcolor="#b9eeff"><font  color="#535455">Shirt</font></th>
    <th width="25%" bgcolor="#b9eeff"><font  color="#535455">Other</font></th>
    <th width="25%" bgcolor="#b9eeff"><font  color="#535455">suit</font></th>
   <th width="15%" bgcolor="#b9eeff"><font  color="#535455">Amount</font></th>

   </tr>
   
   
</thead>
   
    <tr>
     <td data-label="F Name" class="tdbg" ><?php echo $dbid ?></td>
      <td data-label="M Name" class="tdbg"><?php echo $dodate ?></td>
      <td  data-label="L Name" class="tdbg"><?php echo $dddate ?></td>
      <td  data-label="Address" class="tdbg"><?php echo $ddelvdate ?></td>
      <td  data-label="B Date" class="tdbg"><?php echo $dpants ?></td>
      <td  data-label="B Date" class="tdbg"><?php echo $dshirts ?></td>
      <td  data-label="B Date" class="tdbg"><?php echo $other ?></td>
      <td  data-label="B Date" class="tdbg"><?php echo $suit ?></td>
      <td  data-label="B Date" class="tdbg"><?php echo $damount?></td>

    </tr></table>
   <br>
    <div id="tablesize">
    <table>
    <thead>
        <tr>
        <th width="20%" height="30" bgcolor="#b9eeff"><font color="#535455">Amount</font>  </th>
   <th width="20%" bgcolor="#b9eeff"><font color="#535455">Paid </font></th>
   <th width="20%" bgcolor="#b9eeff"><font color="#535455">Remaining</font></th>
   </tr>
   
   
</thead>
   
    <tr >
     <td data-label="Contact No " class="tdbg" ><?php echo $damount?></td>
      <td data-label="Alt Contact No" class="tdbg"><?php echo $dpaid + $dadvance?></td>
      <td  data-label="E-Mail id" class="tdbg"><?php echo $damount- ($dpaid+ $dadvance) ?></td>
    </tr>
    
</table>
<br> 
</div>

<hr size="1" color="#f15a29">
<div class="lastvmarg">
      <p><strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Not Delivered</font></strong>
         </div>
         
         <table>
  <thead>
        <tr>
        <th width="10%" height="30" bgcolor="#fffbea"><font color="#f15a29">Bill Id</font>  </th>
  
   <th width="10%" bgcolor="#fffbea"><font  color="#f15a29">Date</font></th>
   <th width="10%" bgcolor="#fffbea"><font  color="#f15a29">D Date</font></th>
   <th width="10%" bgcolor="#fffbea"><font color="#f15a29">Pants</font></th>
   <th width="10%" bgcolor="#fffbea"><font color="#f15a29">Shirts</font></th>
   <th width="10%" bgcolor="#fffbea"><font color="#f15a29">Other</font></th>
   <th width="10%" bgcolor="#fffbea"><font color="#f15a29">Suit</font></th>
   <th width="10%" bgcolor="#fffbea"><font color="#f15a29">Amount</font></th>
   <th width="10%" bgcolor="#fffbea"><font color="#f15a29">Advance</font></th>
   <th width="10%" bgcolor="#fffbea"><font color="#f15a29">REMAINING </font></th>
   <th width="10%" bgcolor="#fffbea"><font color="#f15a29">Select </font></th>
 </tr>
   
   
</thead>
   
      <?php
	  if(isset($_POST['search']))
{
    $query = mysql_query ("SELECT * FROM billdata where cid='$id'"); 
	while($idsh = mysql_fetch_object($query))
	{
	$odate=($idsh->odate);	
	$odate = date("d-m-Y", strtotime($odate));
	
	$ddate=($idsh->ddate);	
	$ddate = date("d-m-Y", strtotime($odate));
		
		$bid=($idsh->bid);
	?>
    <tr >
 <td height="30" data-label="F Name" ><?php echo $bid ?></td>
      <td  data-label="Address" ><?php echo $odate ?></td>
      <td  data-label="B Date"><?php echo $ddate ?></td>
      
      <td data-label="Contact No " ><?php echo ($idsh->pants) ?></td>
       
  <td  data-label="E-Mail id"><?php echo($idsh->shirts) ?></td>
   <td  data-label="E-Mail id"><?php echo($idsh->other) ?></td>
   <td  data-label="E-Mail id"><?php echo($idsh->suit) ?></td>
       <td  data-label="E-Mail id"><?php echo($idsh->amount) ?></td>
       <td  data-label="E-Mail id"><?php echo ($idsh->advance) ?></td>
       <td  data-label="E-Mail id"><?php echo($idsh->remaining) ?></td>
       <td  data-label="E-Mail id"><a href="delivery.php?edit_bid=<?php echo $bid;?>"><img src="images/select.png"></a></td>

    </tr>
    
    <?php
	}
}
 ?>-->
    </table>
    </form>
 </section>
  </header>
</body>
</html>