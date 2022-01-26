<?php
$user = $_SESSION['dh_user'];
$query = mysqli_query($db, "SELECT * FROM tasks WHERE assigned_to='$user' && design_status='Pending'");
?>
<div class="bg-gray-300 dark:bg-stone-600 w-64 flex flex-col gap-4 smhidden smooth flex-none">
    <!-- <div class="relative w-full flex flex-col justify-center p-4">
        <input type="text" name="search" id="search" class="input-text w-full shadow-main smooth">
        <span class="absolute right-6"><i class="fad fa-search z-10"></i></span>
    </div> -->
    <div class="rounded-none px-4 py-2 bg-lime-600 shadow-main text-white">
        <h1>New Tasks</h1>
    </div>
    <div class="card-stack" id="newtasks">
        <?php foreach ($query as $row) : ?>
        <div class="pannel-card">
            <h1><?php echo $row['task_subject']; ?></h1>
            <span class="text-xs dark:text-stone-100/50 text-stone-500"><?php echo $row['created_on']; ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</div>