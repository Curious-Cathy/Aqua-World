<?php
include("../Connection/Connection.php");
session_start();
  if(isset($_POST["pay"]))
 {header("location: Payment.php");  }

require('Head.php');
//$sql="select * from tbl_productbooking,tbl_user where tbl_productbooking.user_id='".$_SESSION["uid"]."' and tbl_productbookinf.user_id='".$usr."' and ";
$proid=$_SESSION["pro"];


$sele="select * from tbl_productbooking b inner join tbl_aquariumtype t on b.atype_id=t.atype_id inner join
tbl_user u on u.user_id=b.user_id where b.user_id='".$_SESSION["uid"]."' and pbooking_id='".$proid."'";

$a=mysqli_query($conn,$sele);

$data=mysqli_fetch_array($a);

                          
                            

?>
<style type="text/css">
  .card {
    margin-bottom: 1.5rem
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid #c8ced3;
    border-radius: .25rem
}

.card-header:first-child {
    border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0
}

.card-header {
    padding: .75rem 1.25rem;
    margin-bottom: 0;
    background-color: #f0f3f5;
    border-bottom: 1px solid #c8ced3
}
</style>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Invoice</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html"></a></li>
        <li class="breadcrumb-item active">AQUAWORLD
      </ol>
    </nav>
  </div><!-- End Page Title -->
<form id="form1" name="form1" method="post" action="">
  <section class="section row">

    <div class="container-fluid">
    <div id="ui-view" data-select2-id="ui-view">
        <div>
          
                <div class="card-body">
                    <div class="row mb-4">
                        
                        <div class="col-sm-4">
                            <h6 class="mb-3">To:</h6>
                            <div>
                                <strong>AQUAWORLD.com</strong>
                            </div>
                            <div><?php echo $data["user_name"]; ?></div>
                            <div><?php echo $data["user_address"]; ?></div>
                            <div>Email: <?php echo $data["user_email"]; ?></div>
                            <div>Phone: <?php echo $data["user_contact"]; ?></div>
                        </div>
                       
                        </div>
                    </div>
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Item</th>
                                    <th>Description</th>
                                    <th class="center">Quantity</th>
                                    <th class="right">Unit Cost</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="center">1</td>
                                    <td class="left"><?php echo $data["atype_name"]; ?></td>
                                    <td class="left"></td>
                                    <td class="center"><?php echo $data["quantity"];?></td>
                                    <td class="right">Rs.<?php echo $data["atype_rate"]; ?></td>
                                    <td class="right">Rs.<?php echo $data["totalamount"]; ?></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right">Rs.<?php echo $data["totalamount"]; ?></td>
                                    </tr>
                                 
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong>Rs.<?php echo $data["totalamount"]; ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <input type="submit" id="pay" name="pay" value="Confirm Booking" onclick="showAlert()">
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  	  </section>
</form>
<script type="text/javascript">
    function showAlert() {
        alert("Booked successfully!");
        window.location.href = "Viewaquariumdetails.php"; 
    }

    document.getElementById("form1").onsubmit = function(e) {
        e.preventDefault(); 
        showAlert(); 
    };
</script>
     </main><!-- End #main -->

<?php
require('Foot.php');
?>