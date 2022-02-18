<!-- Queries -->

<?php

?>

<!-- end Queries -->

<!-- Check to see if alltask is called -->
<?php if (!isset($_GET['alltask'])) : ?>
    <?php echo "You are not allowed to view this."; ?>
<?php else : ?>



    <!-- title -->
    <script>
        var title = 'All tasks';
    </script>
    <!-- end title -->


    <!-- <div class="w-full container mx-auto text-center bg-slate-200">
            All task view coming soon! Please stay tuned.
        </div> -->
    <div class="maincontent select-none">
        <div class="header z-[50] fadeInTop">
            <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
            <h1>All tasks list</h1>
        </div>
        <div class="flex gap-4 fadeInTop">
            <button class="<?php if(isset($_GET['list'])){ echo 'btn-secondary'; } else { echo 'btn-primary hover:shadow-none hover:scale-100'; } ?>" id="all" <?php if(isset($_GET['list'])){ echo ""; } else { echo "disabled"; } ?> >All</button>
            <button class="<?php if((isset($_GET['list']) && ($_GET['list'] == "byyou") )){ echo "btn-primary hover:shadow-none hover:scale-100"; } else { echo 'btn-secondary'; } ?>" id="byyou" <?php if((isset($_GET['list'])) && ($_GET['list'] == "byyou")){ echo "disabled"; } else { echo ""; } ?>>Tasks you assigned</button>
            <button class="<?php if((isset($_GET['list']) && ($_GET['list'] == "toyou") )){ echo "btn-primary hover:shadow-none hover:scale-100"; } else { echo 'btn-secondary'; } ?>" id="toyou" <?php if((isset($_GET['list'])) && ($_GET['list'] == "toyou")){ echo "disabled"; } else { echo ""; } ?>>Assigned to you</button>
        </div>
        <div class="flex flex-col gap-4">
            <?php
            if (!isset($_GET['list'])){
                include 'all.php';
            } else {
                if ($_GET['list'] == "toyou"){
                    include 'toyou.php';
                } else if($_GET['list'] == "byyou"){
                    include 'byyou.php';
                }
            }
            ?>
        </div>
    </div>
    <script>
        $('#toyou').click(function(){
            location.href = mainsite+'?alltask='+user+'&list=toyou';
        })
        $('#byyou').click(function(){
            location.href = mainsite+'?alltask='+user+'&list=byyou';
        })
        $('#all').click(function(){
            location.href = mainsite+'?alltask='+user;
        })
    </script>

<?php endif; ?>