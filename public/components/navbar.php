<?php
if ((!isset($_SESSION['user'])) && (!isset($_SESSION['user_role']))) {
    header('Location: ' . $site . 'admin');
};
$btnTop = array(
    array('Dashboard', '<i class="far fa-home"></i>', 'index.php', 'home'),
);
$btnsuperadmin = array(
    array('Add Users', '<i class="fas fa-user-plus"></i>', '?option=adduser', 'addusers'),
);
$btnbottom = array(
    array('View Profile', '<i class="far fa-user text-2xl"></i>', 'user=' . $_SESSION["user"] . '', 'profile'),
);
?>
<div class="navbar z-[9999]">
    <div class=" flex flex-col gap-2">
        <div class="w-12 h-12 rounded-md flex justify-center items-center relative group">
            <img src="<?php echo $site; ?>img/symbol.svg" alt="logo" class="w-10 h-10 z-[100] dark:hidden">
            <img src="<?php echo $site; ?>img/symbol2.svg" alt="logo" class="w-10 h-10 z-[100] hidden" id="logo">
            <span class="right-arrow left-14"></span>
            <span class="right-tooltip left-[3.7rem]">Designer's Hub</span>
        </div>
        <?php foreach ($btnTop as $btn) : ?>
            <button class="nav-btn group" id="<?php echo $btn['3'] ?>">
                <div class="relative flex items-center">
                    <?php echo $btn['1']; ?>
                    <span class="right-arrow"></span>
                    <span class="right-tooltip"><?php echo $btn['0']; ?></span>
                </div>
            </button>
            <script>
                $('#<?php echo $btn['3']; ?>').click(function() {window.location.replace(site+'<?php echo $btn['2']; ?>')});
            </script>
        <?php endforeach; ?>
        <?php
        if (isset($_SESSION['user_role'])) {
            if ($_SESSION['user_role'] == 'superadmin') {
                foreach ($btnsuperadmin as $btn3) {
        ?>
                    <button class="nav-btn group" id="<?php echo $btn3['3'] ?>">
                        <div class="relative flex items-center">
                            <?php echo $btn3['1']; ?>
                            <span class="right-arrow"></span>
                            <span class="right-tooltip"><?php echo $btn3['0']; ?></span>
                        </div>
                    </button>
                    <script>
                        $('#<?php echo $btn3['3']; ?>').click(function() {
                            window.location.replace(site+'<?php echo $btn3['2']; ?>')
                        });
                    </script>
        <?php
                }
            }
        }
        ?>
    </div>
    <div class=" flex flex-col gap-2">
        <?php foreach ($btnbottom as $btn2) : ?>
            <a href="<?php echo $site . '?' . $btn2['2']; ?>" class="nav-btn group">
                <div class="relative flex items-center">
                    <button class="" id="<?php echo $btn2['3']; ?>"><?php echo $btn2['1']; ?></button>
                    <span class="right-arrow"></span>
                    <span class="right-tooltip"><?php echo $btn2['0']; ?></span>
                </div>
            </a>
        <?php endforeach; ?>
        <div class="nav-btn group" id="loginout">
            <div class="relative flex items-center">
                <button class="" onClick="return confirm('Are you absolutely sure you want logout?')"><i class="fas fa-sign-out-alt text-2xl"></i></i></button>
                <span class="right-arrow"></span>
                <span class="right-tooltip">Log out</span>
            </div>
        </div>
        <div class="nav-btn group">
            <div class="relative flex items-center">
                <button class="" id="toggle" value="dark"><i class="fad fa-lightbulb-slash text-2xl"></i></i></button>
                <span class="right-arrow"></span>
                <span class="right-tooltip">Toggle Dark/Ligth mode.</span>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo $site; ?>js/darkmode.js"></script>
<script>
    $('#loginout').click(function() {
        window.location.replace(site + 'admin/logout.php');
    })
</script>