<?php
include '../../includes/dbconnection.php';
$userqry = mysqli_query($db, "SELECT * FROM userbase WHERE status='Online' ORDER BY ID ASC");
?>
<?php foreach ($userqry as $row) : ?>
    <div class="flex gap-2 px-4 py-2 bg-stone-100/50 rounded-md items-center w-full">
        <div class="flex gap-1">
            <h1 class="text-lime-600 dark:text-lime-700"><?php echo $row['username']; ?></h1>
            <span>is online!</span>
        </div>
    </div>
<?php endforeach; ?>