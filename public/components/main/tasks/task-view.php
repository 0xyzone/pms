<?php if (!isset($_GET['tasks'])) : ?>
    echo "You are not allowed to view this.";
<?php else : ?>
<?php
$tskid = $_GET['viewtask'];
$taskquery = mysqli_query($db, "SELECT * FROM tasks WHERE ID='$tskid'");
$result = mysqli_fetch_array($taskquery);
?>
<script>
    var title = 'Task #<?php echo $tskid; ?>';
</script>
<div class="maincontent">
    <div class="flex flex-col gap-2 w-full">
        <div class="header z-[50] fadeInTop">
            <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
            <h1>Task View</h1>
        </div>
    </div>
    <div class="flex flex-col gap-4 w-full dark:bg-stone-600 bg-stone-300 p-4 rounded-lg smooth shadow-main fadeInBottom">
        <div class="flex justify-between items-center w-full">
            <div>
                <h1 class="dark:text-stone-100 smooth">Task #<?php echo $result['ID']; ?> • <span class="font-normal text-sm text-stone-500"><em>created at: <?php echo $result['created_on']; ?></span></em> </h1>
                <h2 class="text-2xl text-lime-700 dark:text-lime-500 font-bold smooth"><?php echo $result['task_subject'] ?></h2>
            </div>
            <div>
                <a href="" class="btn-primary">something</a>
            </div>
        </div>
        <div class="flex justify-between items-center gap-2">
            <div class="w-4/12 bg-stone-100 dark:bg-stone-200/50 p-4 rounded-lg smooth">
                something
            </div>
        </div>
    </div>
</div>
<?php endif; ?>