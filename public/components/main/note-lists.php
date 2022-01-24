<?php
$query = mysqli_query($db, "SELECT * FROM notes WHERE user='$user' ORDER BY ID ASC");
$numrows = mysqli_num_rows($query);
if (isset($_GET['delete'])) {
    $delid = $_GET['delete'];
    $db->query("DELETE FROM notes WHERE ID=$delid");
    $_SESSION['success'] = "Note deleted successfully";
?>
    <script>
        location.href = site + '?notes=<?php echo $user; ?>'
    </script>
<?php
}
?>



<?php if ($numrows <= 0) : ?>
    <div class="flex flex-wrap gap-4">
        <div class="flex flex-col w-96 border border-stone-300 dark:border-stone-400 p-4 rounded-lg shadow-main relative fadeInBottom">
            <h2 class="text-lg font-bold dark:text-lime-400 truncate">No notes available!</h2>
            <p class="dark:text-stone-200 py-2">Click on create button to get started.</p>
            <div class="flex gap-2 justify-end w-full">

            </div>
        </div>
    </div>
<?php else : ?>
    <?php
    if (isset($_GET['view'])) {
        $nid = $_GET['view'];
        $qry = mysqli_query($db, "SELECT * FROM notes WHERE ID='$nid'");
        $res = mysqli_fetch_array($qry);
        include 'note-view.php';
    ?>


    <?php
    } else {
    ?>
        <div class="flex flex-wrap gap-4">
            <?php foreach ($query as $row) : ?>
                <div class="flex flex-col w-64 border border-stone-300 dark:border-stone-400 p-4 rounded-lg shadow-main relative fadeInBottom">
                    <h2 class="text-lg font-bold dark:text-lime-400 truncate"><?php echo $row['note_title']; ?></h2>
                    <p class="truncate dark:text-stone-200 py-2"><?php echo $row['note_body'] ?></p>
                    <div class="flex gap-2 justify-between w-full items-center">
                        <span class="text-xs text-stone-100/30"><?php echo $row['created_on']; ?></span>
                        <div class="flex gap-3">
                            <a href="<?php echo '?notes=' . $user . '&view=' . $row['ID']; ?>" class="">
                                <i class="fas fa-eye text-stone-500 hover:text-lime-700 hover:dark:text-lime-600" title="View note"></i>
                            </a>
                            <a href="<?php echo '?notes=' . $user . '&delete=' . $row['ID']; ?>" class="" onclick="return confirm('Are you sure you want to delete?')">
                                <i class="fas fa-trash text-red-500/50 hover:text-red-500 hover:dark:text-red-500" title="View note"></i>
                            </a>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>
        </div>

<?php }
endif; ?>