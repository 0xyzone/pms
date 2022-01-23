<?php
include 'includes/main.php';
if ((!isset($_SESSION['user'])) && (!isset($_SESSION['user_role']))) {
    header('Location: ' . $site . 'admin');
} else {
?>
    <div class="flex w-full h-full">
        <?php include 'components/navbar.php'; ?>
        <?php include 'components/pannel.php'; ?>
        <?php include 'components/maincontent.php'; ?>
    </div>
    <script>
        var user = '<?php echo $_SESSION['user']; ?>';
        var userrole = '<?php echo $_SESSION['user_role']; ?>';
        console.log('Current user = ' + user);
        console.log('Current user-role = ' + userrole);
    </script>
<?php } ?>