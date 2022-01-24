<?php
session_start();
include '../dbconnection.php';
include '../globalvar.php';

$uid = $_POST['id'];
$user = $_POST['user'];
$titl = $_POST['title'];
$note = $_POST['note'];

$db->query("UPDATE notes SET note_title='$titl',note_body='$note' WHERE ID='$uid'");
$_SESSION['success'] = "Note updated successfully.";
header('Location: '.$site.'?notes='.$user);
?>