<?php
include("../Connection/Connection.php");
session_start();

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Search Fish</title>
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
<center><h1 align="center">Search Fish </h1></center>



<br>

<table cellpadding="10"  align="center" width="1350" >

		<tr >
<?php
$count=0;
	
	$sel="select * from tbl_fish ";
	//echo $sel;
	$rows=mysqli_query($conn,$sel);
	while($data=mysqli_fetch_array($rows))
	{
		$count+=1;
?>
        <td align="center" >
        <img src="../Assets/Fishimage/<?php echo $data["fish_image"];?>" width="265" height="215"  />
        <br /><b>
     		  <?php  echo $data["fish_name"];?>
            <br />
            </b>
            
           <b>  <h7 style="color: #4e4f57;">Rs.</h7><?php  echo $data["fish_price"];?>
           
           
           </b> <br />
          
       		

            <?php 
            $st=$data["stock"];
            if($st>0)
            {
                $pro=1;
            ?>





 
            &nbsp&nbsp&nbsp&nbsp&nbsp



        
            <button type="button" class="btn btn-warning my-1" name="btn" onClick="window.location.href='Viewmorefish.php?id=<?php echo $data["fish_id"];?>&img=<?php  echo $data["fish_image"];?>&price=<?php  echo $data["fish_price"];?>&name=<?php  echo $data["fish_name"];?>'" >View Details</button>
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




</table>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><<br><br>
<?php
include("Foot.php");
?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  

</body>
</html>