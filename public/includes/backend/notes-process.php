<?php
session_start();
include '../dbconnection.php';
include '../globalvar.php';

if ($_POST){
    $ttl = $_POST['title'];
    $content = $_POST['note'];
    $usr = $_POST['user'];
    date_default_timezone_set('Asia/Kathmandu');
    $date = date('Y-m-d H-i-s');

    $stmt = $db->prepare('INSERT INTO notes(user, note_title, note_body, created_on) VALUES (?, ?, ?, ?)');
    $stmt->bind_param('ssss', $usr, $ttl, $content, $date);
    $stmt->execute();
    $stmt->close();
    $db->close();

    $_SESSION['success'] = "Note added successfully.";
    header('Location: '.$site.'?notes='.$usr);
}
?>