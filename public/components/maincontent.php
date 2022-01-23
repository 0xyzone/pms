<div class="flex-auto p-4 bg-gray-200 dark:bg-stone-700 smooth">
    <!-- main body -->
    <?php if (!isset($_GET['option'])) {
        include 'main/dashboard.php';
    }
    ?>
    <!-- main content -->
    <?php if (isset($_GET['option'])) { ?>
        <?php
        if ($_SESSION['user_role'] == 'superadmin') {
            if ($_GET['option'] == 'adduser') {
                include $site . 'components/main/adduser.php';
            }
        } else {
            echo "You are not permited to view this.";
        }
        ?>
    <?php } ?>

</div>