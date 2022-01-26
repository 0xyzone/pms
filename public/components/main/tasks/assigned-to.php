
<?php 
$aquery = $db->query("SELECT * FROM tasks WHERE assigned_to='$user' && design_status='Pending'");
?>
<div class="flex flex-wrap gap-4 w-full mt-2">
    <?php foreach ($aquery as $row) : ?>
        <div class="flex flex-col w-full border border-stone-300 dark:border-stone-400 p-4 rounded-lg shadow-main relative fadeInBottom">
            <h2 class="text-xl font-bold dark:text-lime-400 truncate"><?php echo $row['task_subject']; ?></h2>
            <p>Assigned by: <span class="font-bold text-lime-700 dark:text-lime-500"><?php echo $row['created_by']; ?></span></p>
            <div class="flex gap-2 justify-between w-full items-center">
                <span class="text-xs dark:text-stone-100/30 text-stone-500"><?php echo $row['created_on']; ?></span>
                <div class="flex gap-3">
                    <a href="<?php echo '?tasks=' . $user . '&viewtask=' . $row['ID']; ?>" class="">
                        <i class="fas fa-eye text-stone-500 hover:text-lime-700 hover:dark:text-lime-600" title="View task"></i>
                    </a>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>