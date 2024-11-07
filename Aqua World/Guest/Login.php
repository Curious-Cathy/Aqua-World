<?php
include("../Connection/Connection.php");
session_start();


	
if(isset($_POST["btnlogin"]))
{
	$username=$_POST["txtusername"];
	$password=$_POST["txtpassword"];
	
	
	$sel="select * from tbl_user where user_uname='".$username."' and user_password='".$password."'";
	$rows=mysqli_query($conn,$sel);
	$count=mysqli_num_rows($rows);
	
	
	
	$sel1="select * from  tbl_shop where shop_uname='".$username."' and shop_password='".$password."' and shop_status=1";
	$rows1=mysqli_query($conn,$sel1);
	$count1=mysqli_num_rows($rows1);
	
	
	
	
	$sel2="select * from tbl_admin where admin_username='".$username."' and admin_password='".$password."'";
	$rows2=mysqli_query($conn,$sel2);
	$count2=mysqli_num_rows($rows2);


	
	


	 if($count>0)
	{
		$data=mysqli_fetch_array($rows);
		$_SESSION["uid"]=$data['user_id'];
		$_SESSION["placeid"]=$data['place_id'];
		header("location:../User/HomePage.php");	
	}
	else if($count1>0)
	{
		$data1=mysqli_fetch_array($rows1);
		$_SESSION["sid"]=$data1['shop_id'];
		header("location:../Shop/Dashboard.php");	
	}

	else if($count2>0)
	{
		$data2=mysqli_fetch_array($rows2);
		
		header("location:../Admin/Homepage.php");	
	}
	
	else
	{
		echo "<script>alert('Invalid Username And Password')</script>";
			
	}
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<style>
html {
  scroll-behavior: smooth;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, sans-serif;
  background: #121212; /* fallback for old browsers */
  overflow-x: hidden;

  height: 100%;

  /* code to make all text unselectable */
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

/* Disables selector ring */
body:not(.user-is-tabbing) button:focus,
body:not(.user-is-tabbing) input:focus,
body:not(.user-is-tabbing) select:focus,
body:not(.user-is-tabbing) textarea:focus {
  outline: none;
}

/* ########################################################## */

h1 {
  color: #5463d6;

  font-size: 35px;
  font-weight: 780;
}

.flex-container {
  width: 100vw;

  margin-top: 60px;

  display: flex;
  justify-content: center;
  align-items: center;
}

.content-container {
  width: 500px;
  height: 350px;
}

.form-container {
  display: flex;
  justify-content: center;
  align-items: center;

  width: 500px;
  height: 350px;

  margin-top: 5px;
  padding-top: 20px;

  border-radius: 12px;

  display: flex;
  justify-content: center;
  flex-direction: column;

  background: #1f1f1f;
  box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.199);
}

.subtitle {
  font-size: 11px;

  color: rgba(177, 177, 177, 0.3);
}

input {
  border: none;
  border-bottom: solid rgb(143, 143, 143) 1px;

  margin-bottom: 30px;

  background: none;
  color: rgba(255, 255, 255, 0.555);

  height: 35px;
  width: 300px;
}

.submit-btn {
  cursor: pointer;

  border: none;
  border-radius: 8px;

  box-shadow: 2px 2px 7px #4d5ee3;

  background: #4d5ee3;
  color: rgba(255, 255, 255, 0.8);

  width: 80px;

  transition: all 1s;
}

.submit-btn:hover {
  color: rgb(255, 255, 255);

  box-shadow: none;
}
.back-btn {
  cursor: pointer;

  border: none;
  border-radius: 8px;

  box-shadow: 2px 2px 7px #4d5ee3;

  background: #4d5ee3;
  color: rgba(255, 255, 255, 0.8);

  width: 80px;
  height: 34px;

  transition: all 1s;
}
.back-btn:hover {
  color: rgb(255, 255, 255);

  box-shadow: none;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login </title>


<br /><br /><br /><br /><br />




<div class="flex-container">
  <div class="content-container">
    <div class="form-container">
<form id="form1" name="form1" method="post" action="">
 
   <h1>
          Login
        </h1>
        <br>
        <br>
        <span class="subtitle">USERNAME:</span>
        <br><input type="text" name="txtusername" id="txtusername" autofocus="autofocus"  autocomplete="off" pattern="[a-zA-Z. @]{3,15}" title="Enter user name or email id" autofocus="autofocus"/>
        
             <br>
        <span class="subtitle">PASSWORD:</span>
        <br>
        <input type="password" name="txtpassword" id="txtpassword"  autocomplete="off"/>
           <br><br>
           
          <input type="submit" name="btnlogin" id="btnlogin" value="Sign in" class="submit-btn"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <!--  <input type="button"  name="btnback" id="btnback" value="Back" class="submit-btn"/>--> 
       
       </form>
       

        

    </div>
  </div>
</div>








<br />
<br />
<br />
<br />
<br />
<br />


</body>
</html>

<br /><br /><br /><br /><br /><br /><br /><br />
