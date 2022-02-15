<?php
include '../../includes/dbconnection.php';
include '../../includes/globalvar.php';
$userqry = mysqli_query($db, "SELECT * FROM userbase WHERE status='Online' ORDER BY ID ASC");
$user = $_COOKIE['dh_user'];
?>
<?php foreach ($userqry as $row) : ?>
    <?php if (($row['username'] == $user) || ($row['username'] == 'superadmin')) {
        continue;
    }; ?>
    <div class="flex gap-2 px-4 py-2 bg-stone-100/50 rounded-md items-center w-full">
        <div class="">
            <a href="<?php echo $site.'?profile='.$row['username']; ?>"><h1 class="text-lime-600 dark:text-lime-700 inline-block"><?php echo $row['username']; ?></h1></a>
            <span class="inline">is online!</span>
        </div>
    </div>
<?php endforeach; ?>