<div class="bg-gray-300 dark:bg-stone-600 w-64 flex flex-col gap-4 smhidden smooth">
    <div class="relative w-full flex flex-col justify-center px-4 pt-4">
        <div class="header">Active users</div>
    </div>
    <div class="card-stack" id="online-users">
        <?php
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
    }, 1000)
</script>