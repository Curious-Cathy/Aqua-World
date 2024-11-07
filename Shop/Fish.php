<?php
include("../Connection/connection.php");
session_start();


if(isset($_POST["btn_save"]))
{	
	
	$image=$_FILES["file_image"]["name"];
	$path=$_FILES["file_image"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Fishimage/".$image);
	
	$fish=$_POST["txt_fishname"];
	$fishtype=$_POST["selct_fishtype"];
	$price=$_POST["txt_price"];
	$des=$_POST["txta_description"];
	
		$ins="insert into tbl_fish(fish_name,fish_image,fishtype_id,fish_price,shop_id,fish_description,stock)
		values('".$fish."','".$image."','".$fishtype."','".$price."','".$_SESSION["sid"]."','".$des."','".$_POST["txt_stock"]."')";
		
		if(mysqli_query($conn,$ins))
		{
			echo "<script>alert('Inserted')</script>";
			header("location:Fish.php");
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
	$rem="delete from tbl_fish where fish_id='$deleted'";
	mysqli_query($conn,$rem);
	echo "<script>alert('Data deleted')</script>";
	//header("location:Fish.php");

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Fish</title>
<?php
include("Head.php");
?>
</head>

<body>
<div align="center" id="tab">
<h1 align="center">Add the fish</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">


    <table  align="center"width="529" border="0" cellspacing="4" cellpadding="0">
    <tr>
      <td width="93">Fish name</td>
      <td width="423"><label for="txt_fishname"></label>
      <input type="text" name="txt_fishname" id="txt_fishname" /></td>
    </tr>
    <tr>
      <td>Fish type</td>
      <td><label for="selct_fishtype"></label>
        <select name="selct_fishtype" id="selct_fishtype">
        <option value=" ">--select--</option>
        <?php
	  $sel="select * from tbl_fishtype";
	  $row=mysqli_query($conn,$sel);
	  while($data=mysqli_fetch_array($row))
	  {
		?>
        <option value="<?php echo $data["fishtype_id"]; ?>">  
      <?php echo $data["fishtype_name"]; ?>
      </option>
      <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" /></td>
    </tr>
     <tr>
      <td>Stock</td>
      <td><label for="txt_stock"></label>
      <input type="number" name="txt_stock" id="txt_stock" min="1" /></td>
    </tr>
    
    <tr>
      <td>Image</td>
      <td><label for="file_image"></label>
      <input type="file" name="file_image" id="file_image" /></td>
    </tr>
        
    <tr>
      <td>Description</td>
      <td><label for="txta_description"></label>
      <textarea name="txta_description" id="txta_description" cols="45" rows="5"></textarea></td>
    </tr>
    <center>
    <tr align="center">
      <td height="53" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btn_save" id="btn_save" value="Save" />&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
      </tr>
    
  </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table align="center" width="1000" >
     <u><h1 align="center">Items Added</h1></u> 
    <tr>
    <td width="42">S No.</td>
    <td align="center"width="137">fish</td>
    <td align="center"width="137">Price</td>
      <td align="center"width="137">Stock</td>
    <td align="center"width="137">Description</td>
    <td align="center"width="137">Image</td>
    <td width="100"></td>
    </tr>
     <?php
	 
    $i=0;
	$sel="select * from tbl_fish  where shop_id='".$_SESSION["sid"]."'";
	$data=mysqli_query($conn,$sel);
	while($row=mysqli_fetch_array($data))
	{
    	$i++;
	?>
     <tr>
    	<td align="center"><?php echo $i; ?></td>
        <td align="center"><?php echo $row["fish_name"];?></td>
        <td align="center"><?php echo $row["fish_price"];?></td>
        <td align="center"><?php echo $row["stock"];?></td>

        <td><?php echo $row["fish_description"];?></td>
        <td align="center"><img width="200" height="150" src="../Assets/Fishimage/<?php echo $row["fish_image"];?>" width='150' height='150' /></td>
        
        <td align="center"><a href="Fish.php?del=<?php echo $row["fish_id"];?>">Delete</a></td>
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