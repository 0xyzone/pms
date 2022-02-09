<!-- Authentication -->
<?php if (!isset($_GET['profile']) || !isset($_SESSION['dh_user'])) : ?>
    <?php echo "You are not allowed to view this."; ?>
    <!-- end Authentication -->
<?php else : ?>
    <?php
    $ujaname = $_GET['profile'];
    /* Queries */
    $profilequery = $db->query("SELECT * FROM profile WHERE uname='$ujaname'");
    $ujaquery = $db->query("SELECT * FROM userbase WHERE username='$ujaname'");
    /** end Queries */



    // print_r($ujatype);
    if (mysqli_num_rows($profilequery) < 1) {
        echo "No results found.";
    } else {

        /** variables */
        $ujares = mysqli_fetch_array($profilequery);
        $ujaares = mysqli_fetch_array($ujaquery);


        $ujaid = $ujares['ID'];
        $ujajoined = $ujares['joined'];

        if (($ujajoined == "0000-00-00") || $ujajoined == NULL) {
            $joined_text = "";
            $join_date = "";
        } else {
            $joined_text = " • Joined";
            $join_date = $ujares['joined'];
        }
        $ujafname = $ujares['fname'];
        $ujalname = $ujares['lname'];
        $ujatype = $ujaares['role'];
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
                <div class="maincontent">
                    <div class="bg-white dark:bg-white w-full h-auto p-4 rounded-2xl shadow-main fadeInBottom flex justify-between">
                        <div class="flex w-max h-max items-center gap-2">
                            <div class="w-auto h-full">
                                <i class="fas fa-user-circle text-6xl text-lime-600"></i>
                            </div>
                            <div class="flex flex-col">
                                <h1 class="text-2xl"><?php echo $ujafname . ' ' . $ujalname; ?> <span class="capitalize">(<?php echo $ujatype; ?>)</span></h1>
                                <span class="text-stone-600"><?php echo '#' . $ujaid . ' • ' . $ujauname . $joined_text . ' ' . $join_date; ?></span>
                            </div>
                        </div>
                        <div class="flex gap-2 fadeInRight">
                            <?php if ($user != $ujauname) : ?>
                                <div class="<?php if ($ujaares['status'] == "Online") {
                                                echo "text-lime-600";
                                            } else {
                                                echo "";
                                            }  ?> border border-current flex items-center px-4 rounded-xl">
                                    <h2 class="text-2xl" id="satatus"><?php echo $ujaares['status']; ?></h2>
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
                    <div>
                        <?php include 'userstats.php'; ?>
                    </div>
                    <div class="flex flex-col gap-4">
                        <fieldset class="w-full rounded-lg text-xl dark:text-white">
                            <legend>Personal Details</legend>
                            <div class="flex items-center gap-2 pl-2">
                                <label for="fname" class="w-2/12 text-left">Full Name</label>
                                <span><?php echo $ujafname . ' ' . $ujalname; ?></span>
                            </div>
                            <div class="flex items-center gap-2 pl-2">
                                <label for="fname" class="w-2/12 text-left">Date of birth</label>
                                <span><?php echo $ujadob; ?></span>
                            </div>
                            <div class="flex items-center gap-2 pl-2">
                                <label for="fname" class="w-2/12 text-left">Address</label>
                                <span><?php echo $ujastreet . ', ' . $ujacity; ?></span>
                            </div>
                        </fieldset>
                        <fieldset class="w-full rounded-lg text-xl dark:text-white">
                            <legend>Contact Details</legend>
                            <div class="flex items-center gap-2 pl-2">
                                <label for="fname" class="w-2/12 text-left">Mobile No.</label>
                                <span><?php echo $ujamno; ?></span>
                            </div>
                            <div class="flex items-center gap-2 pl-2">
                                <label for="fname" class="w-2/12 text-left">Email</label>
                                <span><?php echo $ujaemail; ?></span>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <!-- end User details -->
            <?php endif; ?>
        </div>
    <?php } ?>
<?php endif; ?>