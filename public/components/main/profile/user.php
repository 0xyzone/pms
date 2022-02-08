<!-- Authentication -->
<?php if (!isset($_GET['profile']) || !isset($_SESSION['dh_user'])) : ?>
    <?php echo "You are not allowed to view this."; ?>
    <!-- end Authentication -->
<?php else : ?>
    <?php
    $ujaname = $_GET['profile'];
    /* Queries */
    $profilequery = $db->query("SELECT * FROM profile WHERE uname='$ujaname'");
    /** end Queries */

    /** variables */
    $ujares = mysqli_fetch_array($profilequery);
    $ujaid = $ujares['ID'];
    $ujafname = $ujares['fname'];
    $ujalname = $ujares['lname'];
    $ujauname = $ujares['uname'];
    $ujadob = $ujares['dob'];
    $ujaemail = $ujares['email'];
    $ujamno = $ujares['mno'];
    $ujastreet = $ujares['street'];
    $ujacity = $ujares['city'];
    /** end variables */

    ?>
    <div class="maincontent">

        <!-- Edit mode -->
        <?php if (isset($_GET['edit'])) : ?>
            <!-- title -->
            <script>
                var title = '<?php echo $_GET['profile'] ?> • Edit Profile';
            </script>
            <!-- end title -->
            <div class="header fadeInBottom">
                <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
                <h1>Edit Profile</h1>
            </div>
            <?php include 'editprofile.php'; ?>


            <!-- end Edit mode -->
        <?php else : ?>
            <!-- User details -->
            <!-- title -->
            <script>
                var title = '<?php echo $_GET['profile'] ?> • User Profile';
            </script>
            <!-- end title -->
            <div class="header fadeInBottom">
                <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
                <h1>User Profile</h1>
            </div>
            <div class="bg-white dark:bg-white w-full h-auto p-4 rounded-2xl shadow-main fadeInBottom flex justify-between">
                <div class="flex w-max h-max items-center gap-2">
                    <div class="w-auto h-full">
                        <i class="fas fa-user-circle text-6xl text-lime-600"></i>
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-2xl"><?php echo $ujafname . ' ' . $ujalname; ?></h1>
                        <span class="text-stone-600"><?php echo '#' . $ujaid . ' • ' . $ujauname; ?></span>
                    </div>
                </div>
                <div class="flex gap-2">
                    <?php if ($user != $ujauname) : ?>
                        <div class="text-lime-600 border border-current flex items-center px-4 rounded-xl">
                            <h2 class="text-2xl">Online</h2>
                        </div>
                    <?php endif; ?>
                    <?php if ($user == $ujauname) : ?>
                        <a href="<?php echo $site . '?profile=' . $user . '&edit=' . $ujauname; ?>" class="text-lime-600 border border-current flex gap-2 items-center px-4 rounded-lg">
                            <i class="fas fa-edit text-2xl"></i>
                            <h2>Edit Profile</h2>
                        </a>
                    <?php endif; ?>
                </div>
            </div>



            <!-- end User details -->
        <?php endif; ?>
    </div>
<?php endif; ?>