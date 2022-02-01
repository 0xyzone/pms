<?php
session_start();
include '../dbconnection.php';
include '../globalvar.php';

if (isset($_GET['delete'])) {
    $deleteid = $_GET['delete'];
    $db->query("DELETE FROM task_comments WHERE ID='$deleteid'");
    $_SESSION['success'] = "Comment deleted successfully.";
    header('Location: ' . $site . '?tasks=' . $_GET['tasks'] . '&viewtask=' . $_GET['viewtask']);
}
?>