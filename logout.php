<?php 
session_start();
$_SESSION['status'] = "out";
$_SESSION["msg"] = "Logged Out Successfully";
$_SESSION["err"] = true;
header("Location:./");
?>