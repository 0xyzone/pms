<?php
session_start();
include 'includes/dbconnection.php';
include 'includes/globalvar.php';
// All variable list
$createdby = 'sumnsth';

$query = $db->query("SELECT fname,lname FROM profile WHERE uname='$createdby'");
$res = mysqli_fetch_array($query);
// print_r($createdby);
echo $res['fname'].' '.$res['lname'];
?>