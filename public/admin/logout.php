<?php
include "../includes/globalvar.php";
include "../includes/header.php";
include "../includes/dbconnection.php";
$uname= $_SESSION['dh_user'];
$db->query("UPDATE userbase SET status='Offline' WHERE username='$uname'");
setcookie("dh_user",$_SESSION['dh_user'],time(), "/");
unset($_SESSION['dh_user']);
unset($_SESSION['dh_user-role']);
session_destroy();
header('location: '.$site.'admin');
?>