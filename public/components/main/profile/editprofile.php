<?php if (!isset($_GET['edit'])) : ?>
    <div class="w-full h-full bg-lime-600 flex justify-center items-center">
        <div class="p-4 text-4xl font-bold bg-stone-200">
            You are not allowed in this page!
        </div>
    </div>
<?php else : ?>
    <?php
    $query = $db->query("SELECT * FROM profile where uname='$user'");
    $res = mysqli_fetch_array($query);    
    ?>
    <section id="adduser_form">
        <form action="includes/backend/profile-update.php" method="post" class="dark:text-stone-100 flex flex-col space-y-6 justify-center items-center w-full fadeInBottom">
            <input type="text" name="uname" id="uname" value="<?php echo $user; ?>" hidden>
            <fieldset>
                <legend class="required"> Personal Details </legend>
                <div class="input-group-col">
                    <div class="input-group">
                        <label for="fname" class="input-label">First name:</label>
                        <input type="text" name="fname" id="fname" placeholder="John" value="<?php echo $res['fname']?>" required>
                        <label for="lname" class="input-label">Last name:</label>
                        <input type="text" name="lname" id="lname" placeholder="Doe" value="<?php echo $res['lname']?>" required>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend class="required">Contact details</legend>
                <div class="input-group">
                    <label for="email" class="input-label">Email:</label>
                    <input type="email" name="email" id="email" placeholder="example@test.com" value="<?php echo $res['email']?>" required>
                    <label for="mobile" class="input-label">Mobile No.:</label>
                    <input type="text" name="mobile" id="mobile" placeholder="+9779801234567" value="<?php echo $res['mno']?>" required>
                </div>
            </fieldset>
            <fieldset>
                <legend class="required">Address</legend>
                <div class="input-group">
                    <label for="street" class="input-label">Street:</label>
                    <input type="text" name="street" id="street" placeholder="Dallu Awas" value="<?php echo $res['street']?>">
                    <label for="city" class="input-label">City:</label>
                    <input type="text" name="city" id="city" placeholder="Kathmandu" value="<?php echo $res['city']?>">

                </div>
            </fieldset>
            <button class="btn-primary" onclick="return confirm('Are you sure you want to continue?');"><span> Update</span></button>
        </form>
    </section>
<?php endif; ?>