<?php if (!isset($_GET['option'])) : ?>
    <?php echo "You are not allowed to view this."; ?>
<?php else : ?>
<!-- title -->
<script>
    var title = 'Add User';
</script>
<!-- end title -->
<div class="maincontent">
    <div class="header z-[50] fadeInTop">
        <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
        <h1>Add User</h1>
    </div>
    <section id="adduser_form">
            <form action="includes/backend/user-add.php" method="post" class="dark:text-stone-100 flex flex-col space-y-6 justify-center items-center w-full fadeInBottom">
                <fieldset>
                    <legend> User Details </legend>
                    <div class="input-group-col">
                        <div class="input-group">
                            <label for="uname" class="input-label">Username:</label>
                            <input type="text" name="uname" id="uname" placeholder="username" required>
                            <label for="pw" class="input-label">Password:</label>
                            <input type="text" name="pw" id="pw" placeholder="password" required>
                        </div>
                        <div class="input-group">
                            <label for="role" class="input-label">Role:</label>
                            <select name="role" id="role">
                                <option value="designer">Designer</option>
                                <option value="superadmin">Superadmin</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>

                </fieldset>
                <fieldset>
                    <legend> Personal Details </legend>
                    <div class="input-group-col">
                        <div class="input-group">
                            <label for="fname" class="input-label">First name:</label>
                            <input type="text" name="fname" id="fname" placeholder="John" required>
                            <label for="lname" class="input-label">Last name:</label>
                            <input type="text" name="lname" id="lname" placeholder="Doe" required>
                        </div>
                        <div class="input-group">
                            <label for="dob" class="input-label">Date of birth:</label>
                            <input type="date" name="dob" id="dob" placeholder="01/01/1999" value="01/01/1999">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contact details</legend>
                    <div class="input-group">
                        <label for="email" class="input-label">Email:</label>
                        <input type="email" name="email" id="email" placeholder="example@test.com" required>
                        <label for="mobile" class="input-label">Mobile No.:</label>
                        <input type="text" name="mobile" id="mobile" placeholder="+9779801234567" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Address</legend>
                    <div class="input-group">
                        <label for="street" class="input-label">Street:</label>
                        <input type="text" name="street" id="street" placeholder="Dallu Awas">
                        <label for="city" class="input-label">City:</label>
                        <input type="text" name="city" id="city" placeholder="Kathmandu">

                    </div>
                </fieldset>
                <button class="btn-primary" onclick="return confirm('Are you sure you want to continue?');"><i class="fas fa-user-plus"></i><span> ADD</span></button>
            </form>
    </section>
</div>
<?php endif; ?>