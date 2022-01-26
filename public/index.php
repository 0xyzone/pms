<?php
include 'includes/main.php';
if ((!isset($_SESSION['dh_user'])) || (!isset($_COOKIE['dh_user']))) {
    header('Location: ' . $site . 'admin');
} else {
?>
    <div class="flex w-full h-full">
        <?php include 'components/navbar.php'; ?>
        <?php include 'components/pannel.php'; ?>
        <?php include 'components/maincontent.php'; ?>
        <?php include 'components/pannel-right.php'; ?>
    </div>
    <script>
        $("#title").html(title);
    </script>
<?php } ?>