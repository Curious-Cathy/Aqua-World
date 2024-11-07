<?php
include("../Connection/Connection.php");
session_start();

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Search Aquarium</title>
<?php
include("Head.php");
?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body style="background-image: url(../Assets/User/pro-table-top.png); background-position: left top ; background-repeat:no-repeat; background-attachment:fixed">

<form id="form1" name="form1" method="post" action="">
<h1 align="center"> Aquariums </h1>
</br>
  <table width="1041"  align="center" cellpadding="10">
    
    <tr>
      <th width="201" height="24" scope="row" align="center"></th>
      <th>&nbsp;</th>
       </tr>
  </table>
  <br />


<table cellpadding="10"  align="center" width="1350">

		<tr>
<?php
$count=0;


	
	$sel="select * from tbl_aquariumtype";
	//echo $sel;
	$rows=mysqli_query($conn,$sel);
	while($data=mysqli_fetch_array($rows))
	{
		$count+=1;
?>
        <td align="center">
        	<img src="../Assets/Aquariumimage/<?php echo $data["atype_image"];?>"width="212" height="213"/>
            <br />
     		 <b><?php  echo $data["atype_name"];?>
            <br />
            <h7 style="color: #4e4f57;">Rs.</h7><?php  echo $data["atype_rate"];?></b>
            <br />
           
             <?php 
            $st=$data["stock"];
            if($st>0)
            {
                $pro=2;
            ?>
 
  <button type="button" class="btn btn-primary my-1" name="btn" onClick="window.location.href='Viewmorea.php?id=<?php echo $data["atype_id"]; ?>&img=<?php  echo $data["atype_image"];?>&price=<?php  echo $data["atype_rate"];?>&name=<?php  echo $data["atype_name"];?>'" >View Details</button>


       		

          <h6 align="center">_______</h6>

       		             <?php
           }
           else
           {
           	echo "<h5 style='color : red;'>Stock Out</h5>";
           }
           ?>

              <br />
           
       
       
       
        </td>
   
     
   


<?php
		if($count%4==0)
			{
				echo "</tr>";
				echo "<tr>";
			}	
	}

?>
</form>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include("Foot.php");
?>
 <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>