
<?php
include("../Connection/connection.php");
session_start();


if(isset($_POST["btn_save"]))
{	
	
	$image=$_FILES["file_image"]["name"];
	$path=$_FILES["file_image"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Aquariumimage/".$image);
	
	$aquarium=$_POST["txt_aquarium"];
	$producttype=$_POST["selct_producttype"];
	$price=$_POST["txt_price"];
	
	
		$ins="insert into tbl_aquariumtype(atype_name,atype_image,producttype_id,atype_rate,shop_id,stock)
		values('".$aquarium."','".$image."','".$producttype."','".$price."','".$_SESSION["sid"]."','".$_POST["txt_stock"]."')";
		
		if(mysqli_query($conn,$ins))
		{
			echo "<script>alert('Inserted')</script>";
			header("location:Aquariumtype.php");
		}
		else
		{
			echo "<script>alert('Failed')</script>";
			echo $ins;
		}
				
}
	if($_GET["del"])
{
	$deleted=$_GET["del"];
	$rem="delete from tbl_aquariumtype where atype_id='$deleted'";
	mysqli_query($conn,$rem);
	echo "<script>alert('Data deleted')</script>";
	//header("location:Fish.php");

}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Aquarium</title>
<?php
include("Head.php");
?>
</head>

<body>
<div align="center" id="tab">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
 <h1 align="center" >Add the Aquarium</h1>
  <table align="center" width="529" border="0" cellspacing="4" cellpadding="0">
    <tr>
      <td width="153" height="47"> Product Type </td>
      <td width="237"><label for="select_producttype"></label>
        <select name="selct_producttype" id="select_producttype">
         <option value=" ">--select--</option>
        <?php
	  $sel="select * from tbl_product";
	  $row=mysqli_query($conn,$sel);
	  while($data=mysqli_fetch_array($row))
	  {
		?>
        <option value="<?php echo $data["producttype_id"]; ?>">  
      <?php echo $data["product_name"]; ?>
      </option>
      <?php
	  }
	  ?>
      
      </select></td>
    </tr>
    <tr>
      <td height="45">Aquarium type</td>
      <td><label for="txt_plant"></label>
      <input type="text" name="txt_aquarium" id="txt_aquarium" /></td>
    </tr>
    <tr>
      <td height="54">Price </td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" /></td>
    </tr>
     <tr>
      <td>Stock</td>
      <td><label for="txt_stock"></label>
      <input type="number" name="txt_stock" id="txt_stock" min="1" /></td>
    </tr>
    <tr>
      <td height="47">Image</td>
      <td><label for="file_image"></label>
      <input type="file" name="file_image" id="file_image" /></td>
    </tr>
    <tr>
      <td align="center"height="62" colspan="2"><input type="submit" name="btn_save" id="btn_save" value="Save" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
   <p>&nbsp;</p>
  <p>&nbsp;</p>

    <table align="center" width="1000" >
    <u><h1 align="center" >Items Added</h1></u>
    <tr>
    <td width="42">S No.</td>
    <td align="center"width="137">Aquarium</td>
    <td align="center"width="137">Price</td>
       <td align="center"width="137">Stock</td>
    <td align="center"width="137">Image</td>
    <td width="100"></td>
    </tr>
     <?php
	 
    $i=0;
	$sel="select * from tbl_aquariumtype  where shop_id='".$_SESSION["sid"]."'";
	$data=mysqli_query($conn,$sel);
	while($row=mysqli_fetch_array($data))
	{
    	$i++;
	?>
     <tr>
    	<td><?php echo $i; ?></td>
        <td><?php echo $row["atype_name"];?></td>
        <td align="center"><?php echo $row["atype_rate"];?></td>
        <td align="center"><?php echo $row["stock"];?></td>
        <td align="center"><img width="200" height="150" src="../Assets/Aquariumimage/<?php echo $row["atype_image"];?>" width='100' height='110' /></td>
        <td align="center"><a href="Aquariumtype.php?del=<?php echo $row["atype_id"];?>">Delete</a></td>
        
        <br>
     </tr>
    
     <?php
	}
	?>
   
    </table>
  
</form>
</div>
<?php
include("Foot.php");
?>
</body>
</html>