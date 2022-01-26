<?php
session_start();
include "globalvar.php";
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
    <?php if (isset($_SESSION['user'])) : ?>
    <script>
        var user = '<?php echo $_SESSION['dh_user']; ?>';
        var cookieuser = '<?php echo $_COOKIE['dh_user']; ?>';
        var userrole = '<?php echo $_SESSION['dh_user_role']; ?>';
        console.log('Current user = ' + user);
        console.log('Cookie user = ' + cookieuser);
        console.log('Current user-role = ' + userrole);
    </script>
    <?php endif; ?>
</head>

<body class="w-screen h-screen relative">

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