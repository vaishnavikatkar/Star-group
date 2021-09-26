<?php
include_once('conncet.php');
$query=mysql_query("select id from customers");
	$id=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($id<$idsh['id'])
	$id=$idsh['id'];
	}
	$id++;
if(isset($_POST['submit']))
{	$id=$_POST['id'];
	$date=$_POST['orderdate'];
	$date = date("d-m-Y", strtotime($date));
	$fname=$_POST['FName'];
	//$mname=$_POST['MName'];
	$lname=$_POST['LName'];
	$address=$_POST['Address'];
	$bdate=$_POST['B_Date'];
	$contactno=$_POST['Contact_No'];
	//$altcontactno=$_POST['AltContact_No'];
	$email=$_POST['E_Mail_id'];
	$cimage=$_POST['cimage'];
	
	$file=$_FILES["file"]["name"];
	$tem_name=$_FILES["file"]["tmp_name"];
	$path="cimg/".$file;

	move_uploaded_file($tem_name,$path);
	

mysql_query("insert into customers(id,date,image,fname,mname,lname,address,bdate,contactno,altcontactno,email) values ('$id','$date','$file','$fname','$mname','$lname','$address','$bdate','$contactno','$altcontactno','$email')");

$query=mysql_query("select id from customers");
	$id=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($id<$idsh['id'])
	$id=$idsh['id'];
	}
	$id++;

	$fname="";
	$lname="";
	$address="";
	$bdate="";
	$contactno="";
	$email="";
	
	
}


if(isset($_POST['search']))
{
	//$id=$_POST['id'];
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
$query = mysql_query ("SELECT * FROM customers where lname='$lname' && fname='$fname' || id='$id' || contactno='$contactno'"); 
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
	
	 //echo $idsh ['id'];
	 

	 }
}


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

$tdateaa=date("Y-m-d");


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Add Customer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="Six Revisions">
  <meta name="description" content="How to use the CSS background-size property to make an image fully span the entire viewport."> 
<link href="style.css" rel="stylesheet" type="text/css">

<script>  
function validateForm() {
	
	var x = document.forms["myForm"]["orderdate"].value;
    if (x == "") {
        alert("Date must be filled out");
        return false;

    }
	
    var x = document.forms["myForm"]["FName"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
	}
		var x = document.forms["myForm"]["LName"].value;
    if (x == "") {
        alert("Last Name must be filled out");
        return false;
    }
	
		var x = document.forms["myForm"]["Address"].value;
    if (x == "") {
        alert("Address must be filled out");
        return false;
    }
	
			var x = document.forms["myForm"]["B_Date"].value;
    if (x == "") {
        alert("B Date must be filled out");
        return false;
    }
	
			var x = document.forms["myForm"]["Contact_No"].value;
    if (x == "") {
        alert("Contact No must be filled out");
        return false;
    }
	
	var x = document.forms["myForm"]["E_Mail_id"].value;
    if (x == "") {
        alert("Email must be filled out");
        return false;
    }

}  
</script>


</head>
<body >
  <header class="container">
    <section class="content">
    <center>
    <table>
  <tr>
  <td bgcolor="#fefdf2"><img src="images/logo.PNG" width="80" ></td>
  <td bgcolor="#fefdf2"><font color="#023386" size="+2" class="text"><strong>Gowardhan Tailor</strong></font></td>
  <td bgcolor="#fefdf2"></td>
  </tr>
  </table> </center>
    
    <br><div class="lastvmarg"><a href="Dashboard.html">
    
    <img src="images/backtodashboard.png"></a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="AddCustomer.php" class="nmclick" >Click To Add New Customer</a>
    </div>
    <br>
     <br>
    <center>
      <h2><font color="#f15a29" face="Arial, Helvetica, sans-serif">  Add Customer</font></h2>
</center>
<form method="POST" action="" name="myForm" onSubmit="return validateForm()" enctype="multipart/form-data"> 
      <p><strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Customer Id :-</font></strong>
        <input type="text" name="id" class="outtext" value="<?php echo $id ?>"> 

    </p>
      <table>
  <thead>
        <tr>
        <th width="20%" height="30" bgcolor="#ffffff"><font size="2">Date </font></th>
         <th width="20%" height="30" bgcolor="#ffffff">Image </th>
        <th width="20%" height="30" bgcolor="#ffffff">F NAme </th>
   
   <th width="20%" bgcolor="#ffffff">L Name</th>
   <th width="25%" bgcolor="#ffffff">Address</th>
   <th width="15%" bgcolor="#ffffff">B Date</th>
   <th width="20%" bgcolor="#ffffff">Contact No </th>
   <th width="20%" bgcolor="#ffffff">E-Mail id</th>

   </tr>
   
   
</thead>
   
    <tr >
<td height="48" bgcolor="#FFFFFF" data-label="F Name"><input type="text" name="orderdate" class="intext" value="<?php echo $tdateaa ?>"></td>
<td data-label="F Name" bgcolor="#FFFFFF" >
<img src="" style="display:none" height="100" id="image"/>
<input type="file" name="file"  onchange="showImage.call(this)" />
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

<td data-label="F Name" bgcolor="#FFFFFF">
<input type="text" autofocus="autofocus" class="intext" name="FName" value="<?php echo $fname ?>">
      </td>

      <td  data-label="L Name" bgcolor="#FFFFFF">
       <input type="text" class="intext" name="LName" value="<?php echo $lname ?>">
      </td>
    
      <td  data-label="Address" bgcolor="#FFFFFF"> <input type="text" class="intext" value="<?php echo $address ?>" name="Address"></td>
      <td  data-label="B Date" bgcolor="#FFFFFF"> <input type="text" class="intext" value="<?php echo $bdate ?>" name="B_Date"></td>
      <td data-label="Contact No "bgcolor="#FFFFFF" >
   <input type="text" class="intext" name="Contact_No" value="<?php echo $contactno ?>">
  </td>
  <td  data-label="E-Mail id"bgcolor="#FFFFFF">
       <input type="text" class="intext" name="E_Mail_id" value="<?php echo $email ?>">
      </td>

    </tr></table>
    <br>
    <center>
    <div id="tablesize">


<br>
<input name="submit" type="submit" class="sbut" value="Add">
<input name="update" type="submit" class="sbut" value="Up-Date"> 

</div>
</center>
</form>
<form action="" method="POST" name="a">
<br>
<hr>
<center>
<div id="tablesize">

 <h3><font color="#f15a29" face="Arial, Helvetica, sans-serif">  Search Customer For Update</font></h3>
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

</div>
</center>

</form>
    </section>
  </header>

</body>

</html>