<script>
    var title = 'Notes';
</script>
<?php
$query = mysqli_query($db, "SELECT * FROM notes WHERE user='$user'");

if (mysqli_num_rows($query) > 0) {
    $res = mysqli_fetch_assoc($query);
}
?>
<div class="maincontent">
    <?php if (isset($_GET['new'])) : ?>
        <?php include 'new-note.php'; ?>
    <?php else : ?>
        <div class="header z-[50] fadeInTop">
            <button onclick="history.go(-1)"><i class="fad fa-arrow-left"></i></button>
            <h1>Note List</h1>
        </div>
        <div class="actions">
            <button class="btn-primary fadeInBottom" id="new"><i class="fas fa-file-alt"></i> Create</button>
        </div>
        <?php include 'note-lists.php'; ?>
    <?php endif; ?>
</div>
<script>
    var newsite = site + '?notes=<?php echo $user; ?>&new=1';
    console.log(newsite);
    $('#new').click(function() {
        location.href = newsite;
    })
</script>