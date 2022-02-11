<?php if (!isset($_SESSION['dh_user'])) : ?>
    <?php echo "You are not allowed to view this."; ?>
<?php else : ?>
    <?php
    $profile = $_SESSION['dh_user'];
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
        array('Total', '<i class="fas fa-list-check text-5xl text-violet-700"></i>', $ttltsk)
    );    
    ?>
<!-- title -->
<script>
    var title = 'All Task';
</script>
<!-- end title -->
<div class="flex w-full gap-2 fadeInBottom">
    <?php foreach ($stats as $row) : ?>
        <div class="flex w-3/12 justify-between items-center gap-4 bg-white p-4 rounded-lg">
            <div class="flex items-center w-max gap-2">
                <?php echo $row['1']; ?>
                <div class="flex flex-col justify-center items-start select-none">
                    <h2 class="text-sm font-bold select-none"><?php echo $row['0']; ?></h2>
                    <span class="text-sm text-stone-600 select-none">Tasks</span>
                </div>
            </div>
            <span class="text-4xl font-bold pl-2"><?php echo $row['2']; ?></span>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
