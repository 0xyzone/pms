<script>
    var title = 'Tasks';
</script>
<div class="maincontent">
    <?php
    if (isset($_GET['newtask'])) {
        include 'newtask.php';
    } else if (isset($_GET['viewtask'])) {
        include 'task-view.php';
    } else {
        include 'lists.php';
    } ?>
</div>