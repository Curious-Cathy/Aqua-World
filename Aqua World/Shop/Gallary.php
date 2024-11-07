<?php
include("../Connection/Connection.php");
ob_start();
session_start();
$_SESSION['gid']=$_GET['pgid'];
	
if(isset($_POST["btnsubmit"])){
	
	//$_SESSION['gid']=$_GET['pgid'];
	$img=$_FILES["fileimg"]["name"];
	$path=$_FILES["fileimg"]["tmp_name"];
	move_uploaded_file($path,"../Assets/PlantGallery/".$img);
	
	
	$ins="insert into tbl_pgallery(plants_id,plants_img)values('".$_SESSION['gid']."','".$img."')";
	mysql_query($ins,$con);
	//echo $ins;pgallery_id
	//header("location:PalntsGallery.php");
}






if(isset($_POST["btncancel"])){	header("location:PalntsGallery.php");}


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"><div align="center">
  <table width="317" border="1" align="center">
    <tr>
      <td width="83">Photo</td>
      <td width="218"><input type="file" name="fileimg" id="fileimg" required="required"/></td>
    </tr>
    <tr><td></td>
      <td>
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
       <input type="submit" name="btncancel" id="btncancel" value="Cancel" formnovalidate="formnovalidate"/>
   </td>
    </tr>
  </table></div>
</form>
<br />
<br />
<br />
<table border="1" align="center">
<tr>
<th>Photo</th>

</tr>


<?php
$_SESSION['gid']=$_GET['pgid'];
$sel="select * from    tbl_pgallery g inner join tbl_plants p on g.plants_id=p.plants_id where g.plants_id='".$_SESSION['gid']."'";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
//echo $sel;	
?>

<tr>
<td><img src="../Assets/PlantGallery/<?php echo $data["plants_img"]; ?>"  width="290" height="290"/></td>


</tr>



<?php


}

?>

</tr>






</table>

</body>
</html>