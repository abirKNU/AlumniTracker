<?php
$server = "localhost";
$user="root";
$pass="";
$db="alumni_tracking_system";
$con = mysqli_connect($server,$user,$pass,$db);
echo mysqli_connect_error();
?>