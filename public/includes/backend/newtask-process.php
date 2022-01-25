<?php
session_start();
include '../dbconnection.php';
include '../globalvar.php';
date_default_timezone_set('Asia/Kathmandu');
$date = date('Y-m-d H:i:s');
$assigned_by = $_POST['user'];
$assign_to = $_POST['assign_to'];
$task_subject = $_POST['task_subject'];
$task_details = $_POST['task_details'];
$company = $_POST['company'];
$remarks = $_POST['remarks'];
$design_status = "Pending";
$post_status = "Pending";

$stmt = $db->prepare("INSERT INTO tasks(created_on, created_by, assigned_to, task_subject, company, task_details, design_status, post_status, remarks) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('sssssssss', $date, $assigned_by, $assign_to, $task_subject, $company, $task_details, $design_status, $post_status, $remarks);
$stmt->execute();
$stmt->close();
$db->close();

$_SESSION['success'] = "Task added successfully.";
header('Location: '.$site.'?tasks='.$assigned_by);
?>