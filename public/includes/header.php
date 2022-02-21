<?php
session_start();
include "globalvar.php";
include "dbconnection.php";
// inactive in seconds
if (isset($_SESSION['dh_user'])) {
    $ujaaa = $_SESSION['dh_user'];
}
$inactive = 60 * 60;
if (!isset($_SESSION['timeout']))
    $_SESSION['timeout'] = time() + $inactive;

$session_life = time() - $_SESSION['timeout'];

if ($session_life > $inactive) {
    $db->query("UPDATE userbase SET status='Offline' WHERE username='$ujaaa'");
    setcookie("dh_user", $_SESSION['dh_user'], time(), "/");
    session_destroy();
    header('Location: ' . $site . 'admin');
}

$_SESSION['timeout'] = time();
?>

<!DOCTYPE html>
<html lang="en" id="html">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $site; ?>css/tailwind.css">
    <link rel="stylesheet" href="<?php echo $site; ?>css/all.css">
    <link rel="stylesheet" href="<?php echo $site; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $site; ?>css/style-dark.css">
    <link rel="shortcut icon" href="img/symbol.svg" type="image/x-icon">
    <script src="<?php echo $site ?>js/push.min.js"></script>
    <script src="<?php echo $site ?>js/serviceWorker.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="<?php echo $site ?>js/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <script>
        let Mode = localStorage.getItem('Mode');
        const enableDarkMode = () => {
            $('#html').addClass('dark');
            localStorage.setItem('Mode', 'dark');
        }
        const disableDarkMode = () => {
            $('#html').removeClass('dark');
            localStorage.setItem('Mode', null);
        }

        if (Mode === 'dark') {
            enableDarkMode();
            $('#toggle').html('<i class="fad fa-lightbulb-on text-2xl"></i>');
            $('#toggle').val('light');
            $('#logo').removeClass('hidden');
        }
    </script>
    <title id="title"></title>
    <script>
        var user = '<?php echo $_SESSION['dh_user']; ?>';
        var cookieuser = '<?php echo $_COOKIE['dh_user']; ?>';
        var userrole = '<?php echo $_SESSION['dh_user_role']; ?>';
        console.log('Current user = ' + user);
        console.log('Cookie user = ' + cookieuser);
        console.log('Current user-role = ' + userrole);
    </script>
</head>

<body class="w-screen h-screen relative selection:bg-lime-500 selection:text-white overflow-x-hidden">
    <div class="w-full h-full absolute top-0 bg-lime-800 z-[99999] flex justify-center items-center md:hidden">
        <div class="p-5 bg-black/50 border-4 border-current text-yellow-500 text-2xl flex items-center gap-2 w-10/12">
            <i class="fas fa-sensor-alert fa-2x"></i> Please use a desktop or a laptop to view the contents!
        </div>
    </div>

    <?php
    if (isset($_SESSION['error'])) :
    ?>
        <div class="absolute z-20 w-max py-2 px-4 font-bold bottom-8 right-8 bg-red-200 text-red-800 border border-current fadeInLeft text-xl shadow-main rounded" id="err">
            <?php echo $_SESSION['error']; ?>
        </div>
        <script>
            setTimeout(function() {
                $('#err').fadeOut('slow');
                <?php unset($_SESSION['error']); ?>
            }, 3000); // <-- time in milliseconds
        </script>
    <?php endif;  ?>
    <?php
    if (isset($_SESSION['success'])) :
    ?>
        <div class="absolute z-20 w-max py-2 px-4 bottom-8 right-8 bg-lime-200 text-lime-800 border border-current fadeInLeft text-xl shadow-main rounded" id="success">
            <?php echo $_SESSION['success']; ?>
        </div>
        <script>
            setTimeout(function() {
                $('#success').fadeOut('slow');
                <?php unset($_SESSION['success']); ?>
            }, 3000); // <-- time in milliseconds
        </script>
    <?php endif;  ?>