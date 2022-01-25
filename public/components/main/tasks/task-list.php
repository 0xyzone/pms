<script>
    var title = 'Tasks';
</script>
<div class="maincontent">
    <?php
    if (isset($_GET['newtask'])){
        include 'newtask.php';
    } else {
    ?>
    <div class="header z-[50] fadeInTop">
        <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
        <h1>Task List</h1>
    </div>
    <div class="actions">
        <button class="btn-primary fadeInBottom" id="newtask"><i class="fad fa-layer-plus text-2xl"></i> Create task</button>
    </div>
    <script>
        $('#newtask').click(function(){
            location.href = site + '?tasks=' + user + '&newtask=1';
        })
    </script>
    <?php } ?>
</div>