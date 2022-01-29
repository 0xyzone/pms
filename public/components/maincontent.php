<div class=" p-4 bg-gray-200 dark:bg-stone-700 smooth overflow-y-auto flex-auto">
    <?php
    $user = $_SESSION['dh_user'];
    ?>
    <?php include 'main/greetings.php'; ?>
    <!-- main body -->
    <?php
    
    ?>
    <!-- main content -->
    <?php if (isset($_GET['option'])) { 
        if ($_SESSION['dh_user_role'] == 'superadmin') { // Execute only if the user is superadmin
            if ($_GET['option'] == 'adduser') {
                include 'main/adduser.php';
            }
        } else {
            echo "You are not permited to view this.";
        }
    } elseif (isset($_GET['notes'])) {
        include 'main/notes.php';
    } elseif (isset($_GET['tasks'])) {
        include 'main/tasks/task-list.php';
    } elseif (isset($_GET['alltask'])) {
        include 'main/tasks/alltasks.php';
    } elseif (isset($_GET['dashboard'])) {
        include 'main/dashboard.php';
    } else {
        include 'main/dashboard.php';
    }
    ?>
</div>