<?php
include '../includes/main.php';
include '../includes/background.php';
if ((isset($_SESSION['user'])) && (isset($_SESSION['user_role']))) {
    header('Location: ' . $site);
} else {
    include 'process.php';
?>
    <script>
        var title = 'Log In';
        $("#title").html(title);

        var user = '<?php echo $_SESSION['user']; ?>';
        console.log('Current user = ' + user);
    </script>
    <script src="<?php echo $site ?>js/darkmode.js"></script>
    <div class="w-full h-full flex justify-center items-center bg-stone-200 z-10">
        <div class="box">
            <div class="box-header flex justify-between items-center w-full">Login
                <div class="nav-btn group">
                    <div class="relative flex items-center">
                        <button class="" id="toggle" value="dark"><i class="fad fa-lightbulb-slash text-2xl"></i></i></button>
                        <span class="right-arrow"></span>
                        <span class="right-tooltip">Toggle Dark/Ligth mode.</span>
                    </div>
                </div>
                <script src="../js/darkmode.js"></script>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div id="whoobe-h90kl" class="w-full justify-start flex flex-col">
                    <div id="whoobe-7izhv" class="flex flex-row">
                        <label for="uname" class="z-highest rounded-l-lg w-10 h-10 flex justify-center items-center text-lime-600 dark:text-lime-500 border-2 border-r-0">
                            <i class="fas fa-user"></i>
                        </label>
                        <input type="text" value="" class="peer focus:ring-1 focus:ring-lime-500 rounded-r-lg outline-none ring-blue-400 w-full pl-1" id="uname" name="uname" required placeholder="username" autocomplete="off" autocapitalize="off" autofocus pattern="[a-z].{4,}" max-length="4">
                    </div>

                    <div id="whoobe-l6k6r" class="my-4 flex flex-row">
                        <label for="pw" class="z-highest rounded-l-lg w-10 h-10 flex justify-center items-center text-lime-600 dark:text-lime-500 border-2 border-r-0">
                            <i class="fas fa-key"></i>
                        </label>
                        <input type="password" value="" class="h-10 focus:ring-1 focus:ring-lime-500 rounded-r-lg outline-none ring-blue-300 w-full pl-1" id="pw" name="pw" placeholder="password" required pattern=".{8,}">
                    </div>
                    <button value="button" class="px-4 py-2 rounded bg-lime-600 text-white hover:bg-lime-700 w-full smooth" id="submit-btn" name="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
<?php } ?>