<?php
include_once('conncet.php');
$query=mysql_query("select empid from emplyee");
	$empid=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($empid<$idsh['empid'])
	$empid=$idsh['empid'];
	}
	$empid++;
if(isset($_POST['submit']))
{	$id=$_POST['empid'];
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
	$designation=$_POST['designation'];
	

mysql_query("insert into emplyee(empid,efname,eaddress,ebdate,econtact,eemailid,edesignation) values ('$id','$fname','$address','$bdate','$contactno','$email','$designation')");

$query=mysql_query("select empid from emplyee");
	$empid=0;
	while($idsh = mysql_fetch_array($query))
	{
	if($empid<$idsh['empid'])
	$empid=$idsh['empid'];
	}
	$empid++;

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
	//$ffname=$_POST['ffname'];
	//$fname = strtok($ffname, ' ');
	//$lname = strstr($ffname, ' ');
	//$lname=SUBSTR($lname, 1, strlen($lname));
	$ename=$_POST['ffname'];
	$contactno=$_POST['contactno'];
	$empid=$_POST['ida'];
//$query = mysql_query ("SELECT * FROM customers where id='$id' || (fname='$fname' && 'lname='$lname')|| contactno='$contactno' || id='$ida' "); 
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
	
	 //echo $idsh ['id'];
	 

	 }
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
	$id= $_POST['empid'];
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
<title>Add Employee</title>
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
<body>
  <header class="container">
    <section class="content">
    <center>
    <table>
  <tr>
  <td bgcolor="#fefdf2"><img src="images/logo.PNG" width="80"></td>
  <td bgcolor="#fefdf2"><font color="#023386" size="4" class="text"><strong>Employee Management </strong></font></td>
  <td bgcolor="#fefdf2"></td>
  </tr>
  </table> </center>
    
    <br><br><div class="lastvmarg"><a href="empdashboard.html">
    
    <img src="images/backtodashboard.png"></a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="addemplyee.php" class="nmclick" >Click To Add New Employee</a>
    </div>
    <br>
     <br>
    <center>
      <h3><font color="#f15a29" face="Arial, Helvetica, sans-serif">  Add Employee</font></h3>
</center>
<form method="POST" action="" name="myForm" onSubmit="return validateForm()" > 
      <p><strong><font color="#f15a29" face="Arial, Helvetica, sans-serif">Customer Id :-</font></strong>
        <input type="text" name="empid" class="outtext" value="<?php echo $empid ?>"> 

    </p>
      <table>
  <thead>
        <tr>
        
   <th width="25%" height="30" bgcolor="#b9eeff"><font color="#f15a29">Emp Name</font>  </th>
   <th width="25%" bgcolor="#b9eeff"><font  color="#f15a29">Address</font></th>
   <th width="15%" bgcolor="#b9eeff"><font  color="#f15a29">B Date</font></th>
   <th width="20%" bgcolor="#b9eeff"><font color="#f15a29">Contact No </font></th>
   <th width="20%" bgcolor="#b9eeff"><font color="#f15a29">E-Mail id</font></th>
   <th width="20%" bgcolor="#b9eeff"><font color="#f15a29">designation</font></th>
   </tr>
   
   
</thead>
   
    <tr >
     <td data-label="F Name" >
      <input type="text" autofocus="autofocus" class="intext" name="FName" value="<?php echo $fname ?>">
      </td>
      <td  data-label="Address"> <input type="text" class="intext" value="<?php echo $address ?>" name="Address"></td>
      <td  data-label="B Date"> <input type="text" class="intext" value="<?php echo $bdate ?>" name="B_Date"></td>
      <td data-label="Contact No " >
   <input type="text" class="intext" name="Contact_No" value="<?php echo $contactno ?>">
  </td>
  <td  data-label="E-Mail id">
       <input type="text" class="intext" name="E_Mail_id" value="<?php echo $eemail ?>">
      </td>
       <td  data-label="E-Mail id">
       <input type="text" class="intext" name="designation" value="<?php echo $designation ?>">
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

 <h3><font color="#f15a29" face="Arial, Helvetica, sans-serif">  Search Employee For Update</font></h3>
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

</div>
</center>
</form>
    </section>
  </header>
</body>
</html>