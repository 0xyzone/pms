<?php
session_start();
include '../dbconnection.php';
include '../globalvar.php';
date_default_timezone_set('Asia/Kathmandu');
$date = date('Y-m-d H:i:s');
$taskid = $_POST['taskid'];
$createdby = $_SESSION['dh_user'];
$comment = $_POST['comment'];

$profile = $db->query("SELECT fname, lname FROM profile WHERE uname='$createdby'");
$res = mysqli_fetch_array($profile);
$user = $res['fname'].' '.$res['lname'];

$stmt = $db->prepare("INSERT INTO task_comments(created_on, created_by, user, task_id, comment) VALUES(?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $date, $user, $createdby, $taskid, $comment);
$stmt->execute();
$stmt->close();
$db->close();

$_SESSION['success'] = "Comment added successfully.";
header("Location: ".$site.'?tasks='.$user.'&viewtask='.$taskid);

?>