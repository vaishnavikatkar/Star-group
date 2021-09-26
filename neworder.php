<?php
include_once('conncet.php');
require_once 'phpqrcode/qrlib.php';
$id=$_GET['edit_id'];
$ida=$_GET['edit_id'];
$billid=$_GET['edit_bpid'];
$fname=$_GET['edit_fnamea'];
$lname=$_GET['edit_lnamea'];
//$bid=$_GET['edit_bid'];
$fname=$_GET['fname'];
$contactno=$_GET['contactno'];
$t=date("h:i:sa");
$tdateaa=date("Y-m-d");

$query=mysql_query("select billid from bill");
	$billid=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($billid<$idsh['billid'])
	$billid=$idsh['billid'];
	}
	$billid++;

$query=mysql_query("select srno from neworder");
	$srno=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($srno<$idsh['srno'])
	$srno=$idsh['srno'];
	}
	$srno++;
if(isset($_POST['add']))
{
    $billid=$_POST['billid'];
	$odate=$_POST['odate'];
	$otime=$_POST['otime'];
	$type=$_POST['type'];
	$clothimg=$_POST['clothimg'];
	$designimg=$_POST['designimg'];
	$barcode=$_POST['barcode'];
	$qty=$_POST['qty'];
	$req=$_POST['req'];
	$rate=$_POST['rate'];
	$cidm=$_POST['CustId'];
	$work=$_POST['work'];
	$aster=$_POST['astre'];
	$astercust=$_POST['astreyn'];
	$pid=$billid.$qty;
	
	
	$file=$_FILES["file"]["name"];
	$tem_name=$_FILES["file"]["tmp_name"];
	$path="climg/".$file;
	//$path="climg/".uniqid(rand()).$file;
	move_uploaded_file($tem_name,$path);
	
		$filea=$_FILES["filea"]["name"];
$tem_namea=$_FILES["filea"]["tmp_name"];
$patha="deimg/".$filea;
//$patha="deimg/".uniqid(rand()).$filea;
	move_uploaded_file($tem_namea,$patha);
	
 $pid=$srno;

//$pathab = 'qrimages/';
$test = $_POST['qrcode'];
//$fileab = $pathab.$test.".png";
//Qrcode::png($test, $fileab);

	
mysql_query("insert into neworder(billid,cidm,srno,date,time,type,clothimg,designimg,barcode,qty,req,work,aster,astercust,rate) values ('$billid','$cidm','$srno','$odate','$otime','$type','$file','$filea','$test','$qty','$req','$work','$aster','$astercust','$rate')");

$query=mysql_query("select srno from neworder");
	$srno=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($srno<$idsh['srno'])
	$srno=$idsh['srno'];
	}
	$srno++;
	
	
}


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>New Order</title>
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
  <td bgcolor="#fefdf2"><img src="images/logo.PNG" width="70" ></td>
  <td bgcolor="#fefdf2"><font color="#023386" size="+2" class="text"><strong>Gowardhan Tailor</strong></font></td>
  <td bgcolor="#fefdf2"></td>
  </tr>
  </table> 
    <br><div class="lastvmarg">
    <a href="SearchCustomer.php"><img src="images/searchCustomer2.png" width="120" height="40"></a>
    </div>
      <h3><font color="#f15a29" face="Arial, Helvetica, sans-serif">Measurement</font></h3>
      <form method="POST" action="" enctype="multipart/form-data"> 
     
   <hr size="1" color="#f15a29">   
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
      
      <hr size="1" color="#f15a29">
      </center>
      <br>
      <div class="ffleft">
<strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Bill Id :- </font></strong>
<input type="text" name="billid" class="outtext" value="<?php echo $billid ?>">
<strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Date :-</font></strong> 
        <input type="date" name="odate" class="outtext" value="<?php echo $tdateaa ?>">
        
        <strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Time :-</font></strong> 
        <input type="text" name="otime" class="outtext" value="<?php echo $t ?>">
        </div>
      <p>&nbsp;</p>
      <p></p>
      
<table>
        <thead>
        <tr>
        <th width="15%" height="25" bgcolor="#e6f9ff">Type</th>
        <th width="20%" height="25" bgcolor="#e6f9ff">Cloth Img</th>
   <th width="20%" bgcolor="#e6f9ff">Design Img</th>
   <th width="15%" bgcolor="#e6f9ff">QrCode</th>
   <th width="10%" bgcolor="#e6f9ff">Work</th>
   <th width="15%" bgcolor="#e6f9ff">Aster</th>
 <th width="15%" bgcolor="#e6f9ff">Astar From Customer</th>
   </tr>
   
   
</thead>
    <tr >
    <td>
    <select class="intext" name="type">
<option >Blouse</option>
<option >Shirt</option>
</select>
</td>
<td data-label="F Name" >
<img src="" style="display:none" height="100" id="image"/>
<input type="file" name="file" onChange="showImage.call(this)" >
  <script>
	function showImage()
	{
		if(this.files && this.files[0])
		{
			var obj = new FileReader();
			obj.onload = function(data){
				var image = document.getElementById("image");
				image.src = data.target.result;
				image.style.display = "block";
			}
			obj.readAsDataURL(this.files[0]);
		}
	}
</script>
</td>
<td data-label="M Name" >
<img src="" style="display:none" height="100" id="imagea"/>
<input type="file" name="filea" onChange="showImagea.call(this)" >
  <script>
	function showImagea()
	{
		if(this.files && this.files[0])
		{
			var obj = new FileReader();
			obj.onload = function(data){
				var image = document.getElementById("imagea");
				image.src = data.target.result;
				image.style.display = "block";
			}
			obj.readAsDataURL(this.files[0]);
		}
	}
</script>
</td>
<td  data-label="B Date"> <input type="text" class="intext" name="qrcode" value=""></td>

<td  data-label="Product Name"> 
<select class="intext" name="work">
<option>No</option>
<option>Yes</option>
</select>
</td>
<td><select class="intext" name="astre"><option>NO</option>
  <option>YES</option>
  </select></td>
 <td><select class="intext" name="astreyn"><option>NO</option>
  <option>YES</option>
  </select></td>
  </tr>
  </table>
  <br> 
  <center>
  <div id="bdiv"> 
  <table>
  <tr>
  <th bgcolor="#e6f9ff">Qty</th>
  <td  data-label="B Date"> <input type="text" class="intext" name="qty" value="1"></td>
  <th bgcolor="#e6f9ff">Req</th>
  <td>
<select class="intext" name="req">
<option >Normal</option>
<option >Try</option>
<option >Urgent</option>

</select>
</td>
<th width="15%" bgcolor="#e6f9ff">Rate</th>
<td  data-label="Product Name"> <input type="text" class="intext" name="rate" value=""></td>
  </tr>
  </table>
  </div>
  </center>
  <center>
<input name="add" type="submit" class="singlebut" value="Add Product">
<hr size="1" color="#f15a29">
</center>

      <br> 

<table>
        <thead>
        <tr>
        <th width="20%" height="25" bgcolor="#e6f9ff">Type</th>
        <th width="20%" height="25" bgcolor="#e6f9ff">Cloth Img</th>
   <th width="20%" bgcolor="#e6f9ff">Design Img</th>
   <th width="20%" bgcolor="#e6f9ff">Qr Code</th>
   <th width="10%" bgcolor="#e6f9ff">Quantity</th>
   <th width="15%" bgcolor="#e6f9ff">Work</th>
   <th width="15%" bgcolor="#e6f9ff">Aster</th>
   <th width="15%" bgcolor="#e6f9ff">Aster From C</th>
   <th width="15%" bgcolor="#e6f9ff">Rate</th>

   </tr>
   
   
</thead>
<?php
$sql12 = "SELECT * FROM neworder where billid='$billid'";
      $query1 = mysql_query($sql12);
      while($rs2 = mysql_fetch_object($query1)){
	  $prod[]=$idsh['barcode'];
	  $typem=($rs2->type);
	  $clothimgm=($rs2->clothimg);
	  $designimgm=($rs2->designimg);
	  $a="climg/".$clothimgm;
	  $b="deimg/".$designimgm;
	  $barcodem=($rs2->barcode);
	  $qrcode=$barcodem;
	  $qtym=($rs2->qty);
	  $ratem=($rs2->rate);
	  $worka=($rs2->work);
	  $astera=($rs2->aster);
	  $astercust=($rs2->astercust);
	
	  
$pathab = 'qrimages/';
$fileab = $pathab.$qrcode.".png";
Qrcode::png($qrcode, $fileab);
	 
?>
    <tr >
<td><input type="text" class="intext" name="ratrprm" value="<?php echo $typem ?>"></td>
<td data-label="F Name" ><img src="<?php echo $a ?>" width="100" height="100"></td>
<td data-label="M Name" ><img src="<?php echo $b ?>" width="100" height="100"></td>
<td  data-label="L Name">
<?php echo "<img src='".$fileab."' >" ?>
<input type="text" class="intext" name="ratrprm" value="<?php echo $barcodem ?>"></td>
<td  data-label="B Date"> <input type="text" class="intext" name="quantity" value="1"></td>
<td><input type="text" class="intext" name="ratrprm" value="<?php echo $worka ?>"></td>
<td><input type="text" class="intext" name="ratrprm" value="<?php echo $astera ?>"></td>
<td><input type="text" class="intext" name="ratrprm" value="<?php echo $astercust ?>"></td>

<td  data-label="Product Name"> <input type="text" class="intext" name="quantity" value="<?php echo $ratem ?>"></td>
  </tr>
  <?php 
   $totalm +=$ratem;
   
	  }
	  $countt=count($prod);
	  echo "<h4>Total Orders :-  ". $countt;
	  
	  
	  
	  if(isset($_POST['savebill']))
{
    $billidb=$_POST['billid'];
	$odateb=$_POST['odate'];
	$otimeb=$_POST['otime'];
	$ddate=$_POST['ddate'];
	$totalamt=$_POST['totalamt'];
	$cid=$_POST['CustId'];
	$advancea=$_POST['advancea'];
	$name=$_POST['name'];
	
mysql_query("insert into bill(billid,cid,name,orddate,ortime,devdate,nopro,billamount,advance) values ('$billidb','$cid','$name','$odateb','$otimeb','$ddate','$countt','$totalamt','$advancea')");


mysql_query("insert into delivery(cid,billid,name,orddate,ortime,devdate,nopro,billamount,advance) values ('$cid','$billidb','$name','$odateb','$otimeb','$ddate','$countt','$totalamt','$advancea')");

$query=mysql_query("select billid from bill");
	$billid=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($billid<$idsh['billid'])
	$billid=$idsh['billid'];
	}
	$billid++;
}
  ?>
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Total Amount</td>
  <td><input type="text" value="<?php echo $totalm ?>" name="totalamt" class="intext"></td>
  </tr>
  
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td>Advace Amount </td>
  <td><input type="text" value="" name="advancea" class="intext"></td>
  </tr>
  </table>
  <hr size="1" color="#f15a29">
  <center>
  <font color="#f15a29" face="Arial, Helvetica, sans-serif"><strong>D Date</strong></font> <input type="date" name="ddate" class="outtext"> &nbsp;&nbsp;
<input name="savebill" type="submit" class="singlebut" value="Save Bill"> 
<a href="billprint.php?edit_id=<?php echo $id;?>&edit_fnamea=<?php echo $fname ?>&edit_lnamea=<?php echo $lname ?>&edit_bpid=<?php echo $billid ?>" class="nmclickaa">Print Bill</a>

</form> 

</center>
 </section>
  </header>
</body>
</html>