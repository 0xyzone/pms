<?php
include "../includes/globalvar.php";
include "../includes/header.php";
include "../includes/dbconnection.php";
$uname= $_SESSION['user'];
$db->query("UPDATE userbase SET status='Offline' WHERE username='$uname'");
unset($_SESSION['user']);
unset($_SESSION['user-role']);
session_destroy();
header('location: '.$site.'admin');
?>