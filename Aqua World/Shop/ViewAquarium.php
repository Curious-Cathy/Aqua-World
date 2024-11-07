
<?php
include("../Connection/connection.php");
session_start();
if(isset($_GET["acc"]))
{
	      $status=1;
		  $id=$_GET['acc'];
          $upquery="update tbl_productbooking  set booking_status='".$status."'		where 	pbooking_id='".$id."'"; 
		  mysqli_query($conn,$upquery); 
		  
		  
		  echo $upquery;
		  echo "<script> alert ('Booking Accepted');</script>";
		  header("location:ViewAquarium.php");
	      //echo $upquery;
	      
}
if(isset($_GET["rej"]))
{	
		  $status=2;
		  $id=$_GET['rej'];
		  $upquery="update tbl_productbooking  set booking_status='".$status."'		where 	pbooking_id='".$id."'";
		   mysqli_query($conn,$upquery);
		  //echo $upquery
		   echo "<script>alert('Booking Rejected')</script>";
		   header("location:ViewAquarium.php");
		 
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aquarium Ordered</title>
<?php
include("Head.php");
?>
<script>
function accept()
{
	if(confirm("Are you sure want to Accept?"))
{
	return true;
}
else
{
	return false;
}
}
function reject()
{
	if(confirm("Are you sure want to Reject?"))
{
	return true;
}
else
{
	return false;
}
}
</script>
</head>

<body>
<div align="center" id="tab">
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table align="center" width="1020" border="1" cellspacing="2" cellpadding="0">
  <tr>
    <td width="1006" align="center"><table align="center" width="1271" border="1" cellspacing="4" cellpadding="1">
      <tr>
        <td align="center"width="123" height="50">Aquarium Name</td>
        <td width="143" align="center">Image</td>
        <td width="114" align="center">Quantity</td>
        <td width="156" align="center">Total Amount</td>
        
        <td width="107" align="center">User</td>
        <td width="107" align="center">Contact</td>
        <td colspan="2" align="center">Action</td>
      </tr>
      <tr><?php
    
	$sel="select * from tbl_productbooking b inner join tbl_aquariumtype t on b.atype_id=t.atype_id inner join
	      tbl_user u on u.user_id=b.user_id where t.shop_id='".$_SESSION["sid"]."' and b.booking_status=0";
		  
		  
	$data=mysqli_query($conn,$sel);
	
	while($row=mysqli_fetch_array($data))
	{
    	
	?>
      
        <td><?php echo $row["atype_name"] ?></td>
        <td><img width="200" height="150" src="../Assets/Aquariumimage/<?php echo $row["atype_image"] ?>"</td>
        <td><?php echo $row["quantity"];?></td>
        <td><?php echo $row["totalamount"];?></td>
       
        <td><?php echo $row["user_name"];?></td>
         <td><?php echo $row["user_contact"];?></td>
        
        
        
        <td align="center" width="127"><a href="ViewAquarium.php?acc=<?php echo $row["pbooking_id"];?>" onclick ="return accept()">Accept</a></td>
        
        <td align="center" width="209"><a href="ViewAquarium.php?rej=<?php echo $row["pbooking_id"];?>" onclick ="return reject()">Reject</a></td>
      </tr>
      <?php
	}
	?>
    </table></td>
  </tr>
  </table>
</form>
</div>
<?php
include("Foot.php");
?>
</body>
</html>