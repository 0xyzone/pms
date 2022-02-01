<?php if (!isset($_GET['tasks'])) : ?>
    <?php echo "You are not allowed to view this."; ?>
<?php else : ?>
<?php $query = $db->query("SELECT * FROM tasks WHERE created_by='$user' && design_status='Pending' ORDER BY ID DESC");
if (isset($_GET['delete'])) {
    $delid = $_GET['delete'];
    $db->query("DELETE FROM tasks WHERE ID=$delid");
    $_SESSION['success'] = "Task deleted successfully";
?>
    <script>
        location.href = site + '?tasks=<?php echo $user; ?>'
    </script>
<?php
}
?>
<div class="flex flex-wrap gap-4 w-full mt-2">
    <?php foreach ($query as $row) : ?>
        <div class="flex flex-col w-full border border-stone-300 dark:border-stone-400 p-4 rounded-lg shadow-main relative fadeInBottom">
            <h2 class="text-lg font-bold dark:text-lime-400 truncate"><?php echo $row['task_subject']; ?></h2>
            <p>Assigned to: <span class="font-bold text-lime-700 dark:text-lime-500"><?php echo $row['assigned_to']; ?></span></p>
            <div class="flex gap-2 justify-between w-full items-center">
                <span class="text-xs dark:text-stone-100/30 text-stone-500"><?php echo $row['created_on']; ?></span>
                <div class="flex gap-3">
                    <a href="<?php echo '?tasks=' . $user . '&viewtask=' . $row['ID']; ?>" class="">
                        <i class="fas fa-eye text-stone-500 hover:text-lime-700 hover:dark:text-lime-600" title="View note"></i>
                    </a>
                    <a href="<?php echo '?tasks=' . $user . '&delete=' . $row['ID']; ?>" class="" onclick="return confirm('Are you sure you want to delete?')">
                        <i class="fas fa-trash text-red-500/50 hover:text-red-500 hover:dark:text-red-500" title="View note"></i>
                    </a>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>