



<?php
include("../Connection/connection.php");
if(isset($_POST["btn_save"]))
{
	
	$c="SELECT * FROM tbl_user WHERE user_email='".$_POST["txt_email"]."'";
	$a=mysqli_query($conn,$c);
	$num=mysqli_num_rows($a);

if($num>0)
	{
     ?>
     <script>
          alert(" Email id already exit! ");
          
     </script>
     

     <?php
	 
	}
else
	{
	
	$proof=$_FILES["file_photo"]["name"];
	$path=$_FILES["file_photo"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Userproof/".$proof);
	
		$ins="insert into tbl_user(place_id,user_name,user_contact,user_address,user_email,user_uname,user_password,user_picture) 
		values('".$_POST["selct_place"]."','".$_POST["txt_name"]."','".$_POST["txt_contact"]."','".$_POST["txta_address"]."','".$_POST["txt_email"]."','".			        $_POST["txt_username"]."','".$_POST["txt_password"]."','".$proof."')";
		mysqli_query($conn,$ins);
		echo "<script>alert('Registeration Completed')</script>";
		header("location:../Index/index.html");
		
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Sign in</title>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
$(function () {
	$("input, select").on("focus", function () {
		$(this).parent().find(".input-group-text").css("border-color", "#80bdff");
	});
	$("input, select").on("blur", function () {
		$(this).parent().find(".input-group-text").css("border-color", "#ced4da");
	});
});
</script>

</head>



<script src="Jq/jquery.js"></script>
<script>
function show_dis(did)
{
//alert(did);

	$.ajax({
	url: "ajaxdis.php?did="+did,
	 
//alert(mid);
	  cache: false,
	  success: function(html){
		$("#selct_place").html(html);
		//alert(html);
	  }
	});
}
</script>
<style>


.border-md {
	border-width: 2px;
}

.btn-facebook {
	background: #405d9d;
	border: none;
}

.btn-facebook:hover,
.btn-facebook:focus {
	background: #314879;
}

.btn-twitter {
	background: #42aeec;
	border: none;
}

.btn-twitter:hover,
.btn-twitter:focus {
	background: #1799e4;
}

/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/

body {
	min-height: 100vh;
}

.form-control:not(select) {
	padding: 1.5rem 0.5rem;
}

select.form-control {
	height: 52px;
	padding-left: 0.5rem;
}

.form-control::placeholder {
	color: #ccc;
	font-weight: bold;
	font-size: 0.9rem;
}
.form-control:focus {
	box-shadow: none;
}
input#file_photo{
 display:none;

}
input#file_photo + label{
	
	
	background-color: #007bff;
	padding: 8px;
	color: #FFF;
	border: 2px solid #06F;
	border-radius: 9px;
	margin-left: 20px;
}
</style>

<body>

<header class="header">
	<nav class="navbar navbar-expand-lg navbar-light py-3">
		<div class="container">
			<!-- Navbar Brand -->
			<a href="#" class="navbar-brand">
				<img src="https://res.cloudinary.com/mhmd/image/upload/v1571398888/Group_1514_tjekh3_zkts1c.svg" alt="logo" width="150">
			</a>
		</div>
	</nav>
</header>


<div class="container">
	<div class="row py-5 mt-4 align-items-center">
		<!-- For Demo Purpose -->
		<div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
			<img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
			<h1>Create an Account</h1>
			<p class="font-italic text-muted mb-0">Be a part of AquaWorld</p>
			

		</div>

		<!-- Registeration Form -->
		<div class="col-md-7 col-lg-6 ml-auto">

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

				<div class="row">	


					<!-- Name  -->
					<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white px-4 border-md border-right-0">
								<i class="fa fa-user text-muted"></i>
							</span>
						</div>
                        
      <input required type="text" name="txt_name" id="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" placeholder="Name" class="form-control bg-white border-left-0 border-md" />
    </div>
    
					<!-- Phone Number -->
					<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white px-4 border-md border-right-0">
								<i class="fa fa-phone-square text-muted"></i>
							</span>
						</div>
      <input required type="text" name="txt_contact" id="txt_contact" pattern="[7-9]{1}[0-9]{9}" 
                title="Phone number starts with 7-9 and remaing 9 digit with 0-9"  placeholder="Phone Number" class="form-control bg-white border-left-0 border-md"/>
                
     </div>           
                
                
 
					<!-- Address  -->
					<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">

						</div>
      <textarea  required name="txta_address" id="txta_address"  rows="3"  placeholder="Address" class="form-control bg-white border-left-0 border-md"></textarea>
   </div>
   
   

					<!-- Email Address -->
					<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white px-4 border-md border-right-0">
								<i class="fa fa-envelope text-muted"></i>
							</span>
						</div>
      <input  required type="text" name="txt_email" id="txt_email"  placeholder="Email ID" class="form-control bg-white border-left-0 border-md"/>
    </div>
    
					<!-- District -->
					<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white px-4 border-md border-right-0">
								<i class="fa fa-black-tie text-muted"></i>
							</span>
						</div>
        <select required name="selct_district" id="selct_district" required="required" onchange="show_dis(this.value,0)" class="form-control custom-select bg-white border-left-0 border-md">
        <option value=" ">Choose your district</option>
         <?php
	  $sel="select * from tbl_district";
	  $row=mysqli_query($conn,$sel);
	  while($data=mysqli_fetch_array($row))
	  {
		  
		?>
        <option value="<?php echo $data["district_id"]; ?>">  
      <?php echo $data["district_name"]; ?>
      </option>
      <?php
	  }
	  ?>
      </select>
    </div>
    
					<!-- Place-->

	<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white px-4 border-md border-right-0">
								<i class="fa fa-black-tie text-muted"></i>
							</span>
						</div>
      <input  required type="text" name="selct_place" id="selct_place"  placeholder="Enter place" class="form-control bg-white border-left-0 border-md"/>
    </div>
    
					<!--  Username  -->
					<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white px-4 border-md border-right-0">
								<i class="fa fa-user text-muted"></i>
							</span>
						</div>
                        
      <input required type="text" name="txt_username" id="txt_username" placeholder="User Name" class="form-control bg-white border-left-0 border-md"  />
      </div>

					<!-- Password  -->
					<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white px-4 border-md border-right-0">
								<i class="fa fa-lock text-muted"></i>
							</span>
						</div>
      <input required type="password" name="txt_password" id="txt_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" class="form-control bg-white border-left-0 border-md" />
    </div>

					<!--  Image  -->
					<div class="input-group col-lg-12 mb-4">

      <input required type="file" name="file_photo" id="file_photo"  class="form-control bg-white border-left-0 border-md"   />
    
          <label for="file_photo"> Profile photo</label>
       <span>
      <strong>Chosen file:</strong>
      <span id="file_name4">None</span>
      </span>
      <script>
	  
 	 var inputFile3 = document.getElementById('file_photo');
	 var fileNamefield3 = document.getElementById('file_name4');
	 inputFile3.addEventListener('change',function(event){
	 var uploadFileName3 = event.target.files[0].name;
	 fileNamefield3.textContent = uploadFileName3;
	 })
      </script>
  </div>

                    
    					<!-- Submit Button -->
					<div class="form-group col-lg-12 mx-auto mb-0">
     <input type="submit" name="btn_save" id="btn_save" value="Save" class="btn btn-primary btn-block py-2" />
     </div>


					<!-- Divider Text -->
					<div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
						<div class="border-bottom w-100 ml-5"></div>
						<span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
						<div class="border-bottom w-100 mr-5"></div>
					</div>

					

					<!-- Already Registered -->
					<div class="text-center w-100">
						<p class="text-muted font-weight-bold">Already Registered? <a href="Login.php" class="text-primary ml-2">Login</a></p>
					</div>

				</div>
</form>
</div></div></div>

</body>
</html>



