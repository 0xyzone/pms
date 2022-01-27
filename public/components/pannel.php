<?php
$user = $_SESSION['dh_user'];
$query = mysqli_query($db, "SELECT * FROM tasks WHERE assigned_to='$user' && design_status='Pending'");
$query2 = mysqli_query($db, "SELECT * FROM tasks WHERE (assigned_to='$user' || created_by='$user') && design_status='Submitted for review'");
?>
<div class="bg-gray-300 dark:bg-stone-600 w-64 flex flex-col gap-4 smhidden smooth flex-none relative h-full items-center">
    <!-- <div class="relative w-full flex flex-col justify-center p-4">
        <input type="text" name="search" id="search" class="input-text w-full shadow-main smooth">
        <span class="absolute right-6"><i class="fad fa-search z-10"></i></span>
    </div> -->
    <div class="rounded-none px-4 py-2 bg-lime-600 shadow-main text-white w-full">
        <h1>New Tasks</h1>
    </div>
    <div class="card-stack" id="newtasks">
        <?php foreach ($query as $row) : ?>
            <a href="<?php echo $site . '?tasks=' . $user . '&viewtask=' . $row['ID']; ?>">
                <div class="pannel-card">
                    <h1><?php echo $row['task_subject']; ?></h1>
                    <span class="text-xs dark:text-stone-100/50 text-stone-500"><?php echo $row['created_on']; ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="rounded-none px-4 py-2 bg-lime-600 shadow-main text-white w-full">
        <h1>Submitted for review</h1>
    </div>
    <div class="card-stack" id="submitted">
        <?php foreach ($query2 as $row2) : ?>
            <a href="<?php echo $site . '?tasks=' . $user . '&viewtask=' . $row2['ID']; ?>">
                <div class="pannel-card">
                    <h1><?php echo $row2['task_subject']; ?></h1>
                    <span class="text-xs dark:text-stone-100/50 text-stone-500"><?php echo $row2['design_finished']; ?></span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <button class="absolute bottom-2 hover:text-lime-700 hover:dark:text-lime-600 group flex gap-2 items-center dark:text-white">
        <i class="fas fa-eye" title="View all task"></i>
        View all tasks
    </button>
</div>
<script>
    setInterval(function() {
        $.ajax({
            url: "<?php echo $site ?>js/ajax/newtask.php",
            success: function(response) {
                $('#newtasks').html(response);
            }
        });
    }, 1000)
</script>