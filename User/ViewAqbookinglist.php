
<?php
include("../Connection/connection.php");
session_start();
if(isset($_GET["cancel"]))
{	
		  
		  $id=$_GET['cancel'];
		  $del="delete from tbl_productbooking where pbooking_id='".$id."'" ;
		   mysqli_query($conn,$del);
		
		   
		   header("location:ViewAqbookinglist.php");
		 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aquarium Booked</title>
<?php
include("Head.php");
?>

</head>

<body>
<div align="center" id="tab">
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table align="center" width="1020" border="1" cellspacing="4" cellpadding="1">
  <tr>
    <td width="1006" align="center"><table align="center" width="1041" border="1" cellspacing="4" cellpadding="1">
      <tr>
        <td align="center"width="123" height="50">Aquarium Name </td>
        <td width="143" align="center">Amount</td>
        <td width="114" align="center">Quantity</td>
        <td width="156" align="center">Booking Date</td>
        
        <td align="center">Status</td>
      </tr>
      <tr><?php
    
	$sel="select * from tbl_productbooking b inner join tbl_aquariumtype  t on b.atype_id=t.atype_id inner join
	      tbl_user u on u.user_id=b.user_id where b.user_id='".$_SESSION["uid"]."'";
	$data=mysqli_query($conn,$sel);
	
	while($row=mysqli_fetch_array($data))
	{
    	
	?>
    
      
        <td><?php echo $row["atype_name"] ?></td>
        <td><?php echo $row["totalamount"];?></td>
        <td><?php echo $row["quantity"];?></td>
        <td><?php echo $row["booking_date"];?></td>
      
        <td align="center" style="color:red">
         <?php
		  if($row["booking_status"]==0){ echo "Pending";} 
		  else  if($row["booking_status"]==1){ echo "Accepted";}
		   else { echo "Rejected";}  
		    ?> </td>
        
          <td align="center" width="209"><a href="ViewAqbookinglist.php?cancel=<?php echo $row["pbooking_id"];?>">Cancel</a></td>
        </tr>
      <?php
	}
	?>
    </table></td>
  </tr>
  </table>
</form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>

</body>
</html>