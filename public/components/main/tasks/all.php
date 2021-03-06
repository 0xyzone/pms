<?php
$alltaskquery = mysqli_query($db, "SELECT * FROM tasks WHERE (created_by='$user' || assigned_to='$user') ORDER BY ID DESC");
// $alltaskres = mysqli_fetch_assoc($alltaskquery);
?>
<div class="flex flex-wrap gap-4 w-full mt-2">
    <?php if (mysqli_num_rows($alltaskquery) < 1) : ?>
        <div class="flex flex-col w-full border border-stone-300 dark:border-stone-400 p-4 rounded-lg shadow-main relative fadeInBottom">
            <h2 class="text-lg font-bold dark:text-lime-400 truncate">No tasks found!</h2>
            <p>Start by creating/assigning a task! <span class="font-bold text-lime-700 dark:text-lime-500"></span></p>
        </div>
    <?php else : ?>
        <input type="text" name="search" id="isearch" placeholder="Search for tasks..." class="w-full" autofocus autocomplete="off">
        <div class="flex flex-col gap-4 w-full" id="result">
            <?php foreach ($alltaskquery as $row) : ?>
                <div id="results" class="flex flex-col w-full border border-stone-300 dark:border-stone-400 p-4 rounded-lg shadow-main relative fadeInBottom">
                    <h2 class="text-lg font-bold dark:text-lime-400 truncate"><?php echo $row['task_subject']; ?></h2>
                    <p>Assignee: <span class="font-bold text-lime-700 dark:text-lime-500"><?php echo $row['created_by']; ?></span></p>
                    <p>Assigned to: <span class="font-bold text-lime-700 dark:text-lime-500"><?php echo $row['assigned_to']; ?></span></p>
                    <div class="flex gap-2 justify-between w-full items-center">
                        <span class="text-xs dark:text-stone-100/30 text-stone-500"><?php echo $row['created_on']; ?></span>
                        <div class="flex gap-3">
                            <a href="<?php echo '?tasks=' . $user . '&viewtask=' . $row['ID']; ?>" class="">
                                <i class="fas fa-eye text-stone-500 hover:text-lime-700 hover:dark:text-lime-600" title="View note"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <script>
            $(document).ready(function() {
                $('#isearch').keyup(function() {
                    var txt = $(this).val();
                    if (txt != '') {
                        $.ajax({
                            url: "<?php echo $site ?>js/ajax/fetch.php",
                            method: "post",
                            data: {
                                search: txt
                            },
                            dataType: "text",
                            success: function(data) {
                                $('#result').html(data);
                            }
                        });
                    } else {
                        location.href=location.href;
                    }
                });
            });
        </script>
    <?php endif; ?>
</div>