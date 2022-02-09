<?php
if (!isset($_GET['profile'])) {
} else {
    $profile = $_GET['profile'];
    $ttltskquery = $db->query("SELECT * FROM tasks WHERE assigned_to='$profile'");
    $pendingtskquery = $db->query("SELECT * FROM tasks WHERE assigned_to='$profile' && design_status='Pending'");
    $completedtskquery = $db->query("SELECT * FROM tasks WHERE assigned_to='$profile' && design_status='Approved'");
    $inprogresstskquery = $db->query("SELECT * FROM tasks WHERE assigned_to='$profile' && design_status='In Progress'");
    $ttlpending = mysqli_num_rows($pendingtskquery);
    $ttlinprogress = mysqli_num_rows($inprogresstskquery);
    $ttlcompleted = mysqli_num_rows($completedtskquery);
    $ttltsk = mysqli_num_rows($ttltskquery);

    // Arrays
    $stats = array(
        /* [0] = Heading [1] = Icon [2] = Total number */
        array('Pending', '<i class="fas fa-business-time text-5xl text-yellow-500"></i>', $ttlpending),
        array('In Progress', '<i class="fad fa-spinner text-5xl text-cyan-500"></i>', $ttlinprogress),
        array('Completed', '<i class="fas fa-check-double text-5xl text-lime-500"></i>', $ttlcompleted),
        array('Total', '<i class="fa-solid fa-sigma text-5xl text-violet-700"></i>', $ttltsk)
    );
}
?>
<div class="flex w-full gap-2 fadeInBottom">
    <?php foreach ($stats as $row) : ?>
        <div class="flex w-3/12 justify-between items-center gap-4 bg-white/50 dark:bg-stone-100 p-4 rounded-lg smooth shadow-main">
            <div class="flex items-center w-max gap-2">
                <?php echo $row['1']; ?>
                <div class="flex flex-col justify-center items-start">
                    <h2 class="text-sm font-bold"><?php echo $row['0']; ?></h2>
                    <span class="text-sm text-stone-600">Tasks</span>
                </div>
            </div>
            <span class="text-4xl font-bold pl-2"><?php echo $row['2']; ?></span>
        </div>
    <?php endforeach; ?>
</div>