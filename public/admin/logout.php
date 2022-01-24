<?php
include "../includes/globalvar.php";
include "../includes/header.php";
include "../includes/dbconnection.php";
$uname= $_SESSION['dh_user'];
$db->query("UPDATE userbase SET status='Offline' WHERE username='$uname'");
unset($_SESSION['dh_user']);
unset($_SESSION['dh_user-role']);
session_destroy();
header('location: '.$site.'admin');
?>