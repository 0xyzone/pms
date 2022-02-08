<div class="bg-gray-300 dark:bg-stone-600 w-64 flex flex-col gap-4 smhidden smooth flex-none">
    <div class="relative w-full flex flex-col justify-center px-4 pt-4">
        <div class="header">Active users</div>
    </div>
    <div class="card-stack" id="online-users">
        <?php
        $userqry = mysqli_query($db, "SELECT * FROM userbase WHERE status='Online' ORDER BY ID ASC");
        ?>
        <?php foreach ($userqry as $row) : ?>
            <?php if(($row['username'] == $user) || ($row['username'] == 'superadmin') ){
                continue;
            }; ?>
            <div class="flex gap-2 px-4 py-2 bg-stone-100/50 rounded-md items-center w-full h-auto">
                <div class="">
                    <h1 class="text-lime-600 dark:text-lime-700 inline-block"><?php echo $row['username']; ?></h1>
                    <span class="inline">is online!</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="relative w-full flex flex-col justify-center px-4 pt-4">
        <div class="header">In progress</div>
    </div>
    <div class="card-stack" id="in-progress">
        <?php
        $tskrqry = mysqli_query($db, "SELECT * FROM tasks WHERE design_status='In Progress' && (assigned_to='$user' || created_by='$user') ORDER BY ID ASC");
        $tskqryselfassign = mysqli_query($db, "SELECT * FROM tasks WHERE design_status='In Progress' ORDER BY ID ASC");
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
    </div>
</div>
<script>
    setInterval(function() {
        $.ajax({
            url: "<?php echo $site ?>js/ajax/online-users.php",
            success: function(response) {
                $('#online-users').html(response);
            }
        });
        $.ajax({
            url: "<?php echo $site ?>js/ajax/tasksinprogress.php",
            success: function(response) {
                $('#in-progress').html(response);
            }
        });
    }, 1000)
</script>