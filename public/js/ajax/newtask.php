<?php
session_start();
include "../../includes/dbconnection.php";
include "../../includes/globalvar.php";
$user = $_SESSION['dh_user'];
$query = mysqli_query($db, "SELECT * FROM tasks WHERE assigned_to='$user' && design_status='Pending'");
?>
<?php foreach ($query as $row) : ?>
    <a href="<?php echo $site . '?tasks=' . $user . '&viewtask=' . $row['ID']; ?>">
        <div class="pannel-card">
            <h1><?php echo $row['task_subject']; ?></h1>
            <span class="text-xs dark:text-stone-100/50 text-stone-500"><?php echo $row['created_on']; ?></span>
        </div>
    </a>
<?php endforeach; ?>