<?php

include_once('conncet.php');
$id=$_GET['edit_id'];
$bid=$_GET['edit_bid'];
$iteamid=$_GET['edit_itmid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Six Revisions">
  <meta name="description" content="How to use the CSS background-size property to make an image fully span the entire viewport."> 
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<table>
  <tr>
  <td bgcolor="#fefdf2"><img src="images/logo.PNG" width="80"></td>
  <td bgcolor="#fefdf2"><font color="#023386" size="+2" class="text"><strong>Tailor Application </strong></font></td>
  <td bgcolor="#fefdf2">&nbsp;</td>
  </tr>
  </table>
  
  <br><div class="lastvmarg">
    <a href="SearchCustomer.php?edit_id=<?php echo $id;?>"><img src="images/searchcustomer2.png" width="120" height="40"></a>
    </div>

<?php
  $query = mysql_query ("SELECT * FROM customers where id='$id'"); 
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
   
   ?>
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
<br />
<table>
<tr>
<th>Design Image</th>
<th>Cloth Image</th>
</tr>
<?php
$query = mysql_query ("SELECT * FROM neworder where billid='$bid' && barcode='$iteamid'"); 
	while($idsh = mysql_fetch_object($query))
	{
	  $clothimgm=($idsh->clothimg);
	  $designimgm=($idsh->designimg);
	  $a="climg/".$clothimgm;
	  $b="deimg/".$designimgm;
      }
      ?>
<tr>
<th><img src="<?php echo $b ?>" width="450" height="450"/></th>
<th><img src="<?php echo $a ?>" width="450" height="450"/></th>

</tr>
</table>
</body>
</html>
