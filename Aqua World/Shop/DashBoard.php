<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DashBoard</title>
<?php
include("Head.php");
?>
</head>


 
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="styles.css">
     </head>
 

  <body style="background-image: url(../Assets/User/slider-left-dec.png); background-position: left ; background-repeat:no-repeat; background-attachment:fixed">
  
  <h1 align="center" style="font-size:100px; font-weight:800">WELCOME</h1>
  <BR>
  <div class="container">
     <div class="row text-center py-5" >
         <div class="col-md-2 col-sm-6 my-3 my-md-0" >
         <form action="index.php" method="post">
         <div class="class shadow">
         <div>
         <img src="../Assets/Fishimage/editted.jpeg" alt="image1" class="img-fluid card-img-top">
          </div>
       <div class="card-body">
         <h5 class="card-title">Add Fish</h5>
       <h7 class="card-title">
     With price and details
       </h7>
       
       <h5>
       <span class="peice"></span>
       </h5>
       <button type="button" class="btn btn-warning my-3" name="btn" onClick="window.location.href='../Shop/Fish.php'" >Click Here</button>
       </div>
       </div>
       </form>
          </div>  
            
            
           
         
              

              
              
              <div class="col-md-2 col-sm-6 my-3 my-md-0">
              <form action="index.php" method="post">
         <div class="class shadow">
         <div>
          <img src="../Assets/Aquariumimage/aqua6.jpg" alt="image1" class="img-fluid card-img-top">
          </div>
       <div class="card-body">
         <h5 class="card-title">Add Aquariums</h5>

       <button type="button" class="btn btn-warning my-3" name="btn" onClick="window.location.href='../Shop/Aquariumtype.php'" >Click Here</button>
       </div>
       </div>
       </form>
              
      
   </div>  
   
     
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




   <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 

<body>

<?php
include("Foot.php");
?>
</body>

</html>