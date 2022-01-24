<form action="includes/backend/update-note.php" method="POST" class="flex flex-col gap-4 w-max fadeInBottom">
    <input type="text" name="id" value="<?php echo $_GET['view']; ?>" hidden>
    <input type="text" name="user" value="<?php echo $_GET['notes']; ?>" hidden>
    <textarea name="title" id="title" cols="30" rows="1" class="font-bold"><?php echo $res['note_title'] ?></textarea>
    <textarea name="note" id="note" cols="30" rows="10"><?php echo $res['note_body'] ?></textarea>
    <div>
        <button type="submit" class="btn-primary">Update</button>
    </div>
</form>