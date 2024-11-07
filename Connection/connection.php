<?php
//$conn=mysqli_connect("localhost","root","");
//mysql_select_db("db_Aquaworld",$conn);

$conn = mysqli_connect("localhost", "root", "", "db_aquaworld");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>