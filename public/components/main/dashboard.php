<?php if (!isset($_SESSION['dh_user'])) : ?>
    <?php echo "You are not allowed to view this."; ?>
<?php else : ?>
<!-- title -->
<script>
    var title = 'All Task';
</script>
<div class="w-full container mx-auto text-center bg-slate-200">
    Dashboard coming soon! Please stay tuned.
</div>
<!-- end title -->
<?php endif; ?>
