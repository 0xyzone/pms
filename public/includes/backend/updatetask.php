<?php
session_start();
date_default_timezone_set('Asia/Kathmandu');
$date = date('Y-m-d H:i:s');
include '../dbconnection.php';
include '../globalvar.php';
if ($_POST){
$taskid = $_POST['id'];
$post_status = $_POST['post_status'];
$user = $_POST['user'];
if (isset($_POST['task_details'])){
    $task_details = $_POST['task_details'];
} else {
    $qry = mysqli_query($db, "SELECT * FROM tasks WHERE ID='$taskid'");
    $res = mysqli_fetch_array($qry);
    $task_details = $res['task_details'];
}
if (isset($_POST['remarks'])){
    $remarks = $_POST['remarks'];
} else {
    $qry2 = mysqli_query($db, "SELECT * FROM tasks WHERE ID='$taskid'");
    $res2 = mysqli_fetch_array($qry2);
    $remarks = $res2['remarks'];
}
if (isset($_POST['design_status'])){
    $design_status = $_POST['design_status'];
} else {
    $qry3 = mysqli_query($db, "SELECT * FROM tasks WHERE ID='$taskid'");
    $res3 = mysqli_fetch_array($qry3);
    $design_status = $res3['design_status'];
}

$query = $db->query("SELECT * FROM tasks WHERE ID='$taskid'");
$res = mysqli_fetch_array($query);

$db->query("UPDATE tasks set design_status='$design_status', post_status='$post_status', task_details='$task_details', remarks='$remarks' WHERE ID='$taskid'");

if (($res['design_started'] == null) || ($res['design_started'] == "") && ($res['design_status'] == $design_status)){
    $db->query("UPDATE tasks set design_started='$date' WHERE ID='$taskid'");
}

if ($design_status == "Pending"){
    $db->query("UPDATE tasks SET design_started=Null,design_finished=Null WHERE ID='$taskid'");
}

if ($design_status == "Submitted for review"){
    $db->query("UPDATE tasks set design_finished='$date' WHERE ID='$taskid'");
}

if ($post_status == "Posted"){
    $db->query("UPDATE tasks set posted_on='$date' WHERE ID='$taskid'");
}

$_SESSION['success'] = "Task updated successfully!";
header('Location: '.$site.'?tasks='.$user.'&viewtask='.$taskid);

} else {
    echo "You are not allowed here!";
}
?>
