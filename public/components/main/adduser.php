<!-- title -->
<script>
    var title = 'Add User';
    $("#title").html(title);
</script>
<!-- end title -->
<div class="flex flex-col gap-4">
    <div class="header">
        <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
        <h1>Add User</h1>
    </div>
    <section id="adduser_form">
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="dark:text-stone-100 flex flex-col space-y-6 items-start justify-start w-full">
                <fieldset>
                    <legend> User Details </legend>
                    <div class="input-group">
                        <label for="uname" class="input-label">Username:</label>
                        <input type="text" name="uname" id="uname">
                        <label for="pw" class="input-label">Password:</label>
                        <input type="password" name="pw" id="pw">
                    </div>
                </fieldset>
                <fieldset>
                    <legend> Personal Details </legend>
                    <div class="input-group-col">
                        <div class="input-group">
                            <label for="fname" class="input-label">First name:</label>
                            <input type="text" name="fname" id="fname">
                            <label for="lname" class="input-label">Last name:</label>
                            <input type="text" name="lname" id="lname">
                        </div>
                        <div class="input-group">
                            <label for="dob" class="input-label">Date of birth:</label>
                            <input type="date" name="dob" id="dob">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Contact details</legend>
                    <div class="input-group">
                        <label for="email" class="input-label">Email:</label>
                        <input type="email" name="email" id="email">
                        <label for="mobile" class="input-label">Mobile No.:</label>
                        <input type="text" name="mobile" id="mobile">
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Address</legend>
                    <div class="input-group">
                        <label for="street" class="input-label">Street:</label>
                        <input type="text" name="street" id="street">
                        <label for="city" class="input-label">City:</label>
                        <input type="text" name="city" id="city">

                    </div>
                </fieldset>
                <button class="btn-primary" onclick="return confirm('Are you sure you want to continue?');">Submit</button>
            </form>
        </div>
    </section>
</div>