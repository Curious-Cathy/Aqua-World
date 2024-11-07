<?php
include("../Connection/Connection.php");
ob_start();

session_start();

 $user=$_SESSION["uid"] ;
if(isset($_POST["btnsave"]))
{
                     
$ins="insert into tbl_productbooking(booking_date,quantity,totalamount,user_id,booking_pstatus,fish_id) values(curdate(),'".$_POST["qty"]."','".$_POST["txtpay"]."','".$_SESSION["uid"]."',1,'".$_GET["id"]."')";



	$rows=mysqli_query($conn,$ins);


    $st="update tbl_fish set stock=stock-'".$_POST["qty"]."' where fish_id='".$_GET["id"]."'";
	$rowzz=mysqli_query($conn,$st);

   $sele="select  pbooking_id from tbl_productbooking where user_id='".$_SESSION["uid"]."' and fish_id='".$_GET["id"]."' and booking_date=curdate()";
    $pro=mysqli_query($conn,$sele);
    while($data=mysqli_fetch_array($pro))
    {
        $prod=$data["pbooking_id"];
        $_SESSION['pro']=$prod;
    }
        
    header("location:invoice.php");
}





?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Stone</title>

<?php
include("Head.php");
?>

</head>
<script src="Jq/jquery.js"></script>
     <script>
  function TotalAmount()
            {
                var Amount=parseInt(document.getElementById("txtRate").value);
                var Count=parseInt(document.getElementById("qty").value);

				if(Count<1){
				    document.getElementById("qty").value=1;
					return false;
					
					}
					else{
                var totamnt=Amount*Count;}
                document.getElementById("txtpay").value=totamnt;
            }
   </script> 
  <body style="background-image: url(../Assets/User/pro-table-top.png); background-position: left top ; background-repeat:no-repeat; background-attachment:fixed">
   <form id="form1" name="form1" method="post" action=""></br></br>
   <table width="280"  border="0" align="center">


 
 <tr>
      <th colspan="2" align="center"><img src="../Assets/Fishimage/<?php echo $_GET["img"];?>" width="286" height="268"></th></tr>
    
    <tr>
      
      <td colspan="2" align="center"><h5><b><?php echo $_GET['name'];?></b></h5></td>
    </tr>
    <?php
    $fi=$_GET["id"];
   $selle="select * from tbl_fish where fish_id=$fi ";
    $ele=mysqli_query($conn,$selle);
    $r=mysqli_fetch_assoc($ele);
    ?>
        <tr>
      <td colspan="2" align="center"><?php echo $r['fish_description'];?></td>
    </tr>
            <tr>     
      <td colspan="2" align="center"><?php echo "_";?></td>
    </tr>





    
                       <?php
                        $fish=$_GET["id"];
    $sel="select * from tbl_fish where fish_id='$fish'";
    $element=mysqli_query($conn,$sel);
    $stock=mysqli_fetch_assoc($element);


      ?> 
                    
                   
         <td align="center">Quantity</td>
                    <td align="center"><input type="number" name="qty" id="qty" onclick="TotalAmount()" max="<?php echo $stock['stock']; ?>"></td>
                </tr>
                
                <tr>
                  <td>Total Amount</td>
                  <td><input type="text" id="txtpay" name="txtpay" required="required" /></td>

                <tr>
                 <tr align="center">


    </tr>
   
   
                    <td><input type="hidden" name="txtRate" id="txtRate" value="<?php echo $_GET["price"] ;?>" /></td>
                 <th align="center"><input type="submit" name="btnsave" id="btnsave" value="BookNow"  /></th>
     
                    
                   
                    
  
</table>
   </form>
   <br><br><br><br><br><br><br><br>
  <?php
include("Foot.php");
?>
   </body>           
</html>