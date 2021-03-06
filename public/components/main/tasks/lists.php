<?php if (!isset($_GET['tasks'])) : ?>
    <?php echo "You are not allowed to view this."; ?>
<?php else : ?>
<div class="header z-[50] fadeInTop select-none">
    <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
    <h1>Task List</h1>
</div>
<div class="actions select-none">
    <button class="btn-primary fadeInBottom" id="newtask"><i class="fad fa-layer-plus text-2xl"></i> Create task</button>
</div>
<script>
    $('#newtask').click(function() {
        location.href = mainsite + '?tasks=' + user + '&newtask=1';
    })
</script>
<div class="w-full flex justify-between gap-4 fadeInBottom select-none">
    <div class="flex flex-col gap-2 w-full">
        <div class="header">Tasks you have assigned</div>
        <?php include 'assigned-by.php'; ?>
    </div>
    <div class="flex flex-col gap-2 w-full">
        <div class="header">Assigned to you</div>
        <?php include 'assigned-to.php'; ?>
    </div>
    <div class="flex flex-col gap-2 w-full smhidden">
        <div class="header">Completed Tasks</div>
        <?php include 'completed.php'; ?>
    </div>
</div>
<?php endif; ?>
