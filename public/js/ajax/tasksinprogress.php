<?php
session_start();
include '../../includes/dbconnection.php';
include '../../includes/globalvar.php';
$user = $_SESSION['dh_user'];
$tskrqry = mysqli_query($db, "SELECT * FROM tasks WHERE design_status='In Progress' && assigned_to='$user' || created_by='$user' ORDER BY ID ASC");
?>
<?php foreach ($tskrqry as $row) : ?>
    <a href="<?php echo $site.'?tasks='.$user.'&viewtask='.$row['ID']; ?>">
        <div class="flex gap-2 px-4 py-2 bg-stone-100/50 rounded-md items-center w-full h-auto">
            <div class="flex flex-col gap-2 overflow-hidden">
                <h1 class="text-lime-600 dark:text-lime-700 text-xl truncate"><?php echo $row['task_subject']; ?></h1>
                <p>
                    <span class="text-stone-600 font-semibold text-sm">Assignee: </span>
                    <span class="font-bold text-stone-800"><?php echo $row['created_by']; ?></span>
                </p>
                <p>
                    <span class="text-stone-600 font-semibold text-sm">Assigned to: </span>
                    <span class="font-bold text-stone-800"><?php echo $row['assigned_to']; ?></span>
                </p>
                <span class="text-stone-600 text-xs">Started at: <?php echo $row['design_started']; ?></span>
            </div>
        </div>
    </a>
<?php endforeach; ?>