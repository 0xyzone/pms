<div class="header z-[50] fadeInTop">
    <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
    <h1>New Note</h1>
</div>
<form action="includes/backend/notes-process.php" method="POST" class="text-white flex flex-col w-full items-center gap-4 fadeInBottom">
    <input type="text" value="<?php echo $user; ?>" name="user" hidden>
    <div class="w-max flex flex-col gap-4">
    <fieldset class="p-4 w-full">
        <legend>Title</legend>
        <input type="text" name="title" class="w-full">
    </fieldset>
    <fieldset class="p-4">
        <legend>Content</legend>
        <textarea name="note" id="note" cols="60" rows="10"></textarea>
    </fieldset>
    </div>
    <div>
        <button type="submit" class="btn-primary" name="submit">Submit</button>
    </div>
</form>