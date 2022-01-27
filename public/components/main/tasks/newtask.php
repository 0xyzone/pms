<?php if (!isset($_GET['tasks'])) : ?>
    <?php echo "You are not allowed to view this."; ?>
<?php else : ?>
<script>
    var title = 'New Task';
</script>
<?php
$query = mysqli_query($db, "SELECT * FROM userbase ORDER BY ID ASC");
?>
<div class="header z-[50] fadeInTop">
    <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
    <h1>New Task</h1>
</div>
<form action="includes/backend/newtask-process.php" method="POST" class="flex flex-col justify-center items-center gap-4 container mx-auto fadeInBottom">
    <input type="text" value="<?php echo $user; ?>" name="user" hidden>
    <div class="w-max flex flex-col gap-4">
        <div class="flex gap-4">
            <fieldset>
                <legend class="required">Task Subject</legend>
                <input type="text" name="task_subject" id="task_subject" required>
            </fieldset>
            <fieldset>
                <legend class="required">Company</legend>
                <input type="text" name="company" id="task_subject" required>
            </fieldset>
        </div>
        <fieldset class="w-full">
            <legend class="required">Assign to</legend>
            <select name="assign_to" id="assign_to" class="w-full">
                <?php foreach ($query as $row): ?>
                <option value="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></option>
                <?php endforeach; ?>
            </select>
        </fieldset>
    </div>

    <fieldset>
        <legend class="required">Task Details</legend>
        <textarea name="task_details" id="task_details" cols="57" rows="10"></textarea>
    </fieldset>
    <fieldset>
        <legend>Remarks</legend>
        <textarea name="remarks" id="remarks" cols="57" rows="2"></textarea>
    </fieldset>
    <button type="submit" id="create" class="btn-primary" onclick="return confirm('Are you sure you want to proceed?')">Create</button>
</form>
<?php endif; ?>
