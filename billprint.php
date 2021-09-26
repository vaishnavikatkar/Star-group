<?php
include_once('conncet.php');
require_once 'phpqrcode/qrlib.php';
//$id=$_GET['edit_id'];
$ida=$_GET['edit_id'];
$billid=$_GET['edit_bpid'];
$billa=($billid)-1;
$fname=$_GET['edit_fnamea'];
$lname=$_GET['edit_lnamea'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="print">
    <a href="SearchCustomer.php"><img src="images/searchCustomer2.png" width="120" height="40" id="print"></a>
    </div>
<button onclick="print()" id="print">Print</button>
<table width="900" id="borderaa" height="120">
<tr>
<td width="398" align="left" valign="middle">
<img src="images/logo.PNG" width="100" height="100"/>
</td>
<td width="365" align="center">
</td>
<td width="121" align="center" valign="top"> <font color="#FF0000" face="Arial , Gadget, sans-serif"> </td>
</tr>
</table>
<table width="900">
<tr>
<td width="127" height="35"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">Name:-</font></strong></td>
<td width="435"><strong><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $fname ?> <?php echo $lname ?></font></strong></td>
<td width="156"><strong><font color="#000000" face="Arial, Helvetica, sans-serif">Cust Id:-</font></strong></td>
<td width="162"><strong><font color="#000000" face="Arial, Helvetica, sans-serif"><?php echo $ida ?></font></strong></td>
</tr>
</table>
<table width="900" id="dis">
<tr>
<td width="84" headers="35"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>Bill No:-</strong></font></td>
<td width="198"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong><?php echo $billa ?></strong></font></td>
<td width="119"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>Order Date:-</strong></font></td>
<td width="192"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong><?php echo $odate ?>20-08-2019</strong></font></td>
<td width="146"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong>Delivery Date:-</strong></font></td>
<td width="133"><font color="#000000" face="Arial, Helvetica, sans-serif"><strong><?php echo $ddate ?>20-08-2019</strong></font></td>
</tr>
</table>

<div id="mndivbb">
 
 
<table width="898"  cellspacing="0">
<tr>
<td width="94" align="center" class="bort">Type</td>
<td width="139" align="center" class="bort">Cloth Iamge</td>
<td width="74" align="center" class="bort">QrCode</td>
<td width="66" align="center" class="bort">Work</td>
<td width="154" align="center" class="bort">Aster</td>
<td width="107" align="center" class="bort">Aster From Cust</td>
<td width="67" align="center" class="bort">Quantity</td>
<td width="103" align="center" class="bort">Rate</td>
<td width="74" align="center" class="bort">Amount</td>
</tr>
<?php 
$query = mysql_query ("SELECT * FROM neworder where billid='$billa'"); 
	while($idsh = mysql_fetch_array($query))
	{
	$clothimg= $idsh['clothimg'];
	$designimg=$idsh['designimg'];
	//$proid=$idsh['barcode'];
	$barcodem=$idsh['barcode'];
	$qrcode=$barcodem;
	$qty=$idsh['qty'];
	$req=$idsh['req'];
	$rate=$idsh['rate'];
	$shirtpattern=$idsh['designimg'];
	$a="deimg/".$shirtpattern;
    $shirtpattern1=$idsh['clothimg'];
	$b="climg/".$shirtpattern1;
	$work=$idsh['work'];
	$aster=$idsh['aster'];
	$astercust=$idsh['astercust'];
	$type=$idsh['type'];
	$pathab = 'qrimages/';
$fileab = $pathab.$qrcode.".png";
Qrcode::png($qrcode, $fileab);

?>
<tr>
<td class="bort" align="center"><?php echo $type ?></td>
<td class="bort" align="center"><img src="<?php echo $b ?>" height="80" width="80" /></td>
<td class="bort" align="center">
<?php echo "<img src='".$fileab."' >" ?>
<br />
<?php echo $barcodem ?></td>
<td class="bort" align="center"><?php echo $work ?></td>
<td class="bort" align="center"><?php echo $aster ?></td>
<td class="bort" align="center"><?php echo $astercust ?></td>
<td class="bort" align="center"><?php echo $qty ?></td>
<td class="bort" align="center"><?php echo $rate ?></td>
<td class="bort" align="center"><?php echo $rate*$qty ?></td>
</tr>
<?php 
	}
?>
<?php
$query = mysql_query ("SELECT * FROM bill where billid='$billa'"); 
	while($idsh = mysql_fetch_array($query))
	{
		$advance=$idsh['advance'];
		$billamount=$idsh['billamount'];
		$fbilla=$billamount-$advance;
	}
	?>
<tr>
<td class="bort"></td>
<td class="bort"></td>
<td class="bort"></td>
<td class="bort"></td>
<td class="bort" align="center"><strong>Total Amount : <strong><?php echo  $billamount ?></strong></strong></td>

<td class="bort" align="center" height="35"><strong>Advance : <?php echo $advance ?></strong></td>
<td class="bort" align="center"><strong></strong></td>
<td class="bort" align="center"><strong>Remaing Amt</strong></td>
<td class="bort" align="center"><strong><?php echo $fbilla ?></strong></td>
</tr>


</table>
</div>
</body>
</html>
