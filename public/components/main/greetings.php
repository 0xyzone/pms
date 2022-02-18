<?php
$usaquery = $db->query("SELECT * FROM profile WHERE uname='$user'");
$usares = mysqli_fetch_array($usaquery);
?>
<div class="flex flex-col gap-2 pl-4 mb-5">
    <h1 class="text-4xl dark:text-zinc-300 select-none">
        <?php
        date_default_timezone_set('Asia/Kathmandu');
        if (date("H") < 5) {
            echo "Hey! Night Owl! ".'<span class="text-lime-500">'.$usares['fname'].'</span>';
        } else if ((date("H") >= 5) && (date("H") < 12)) {
            echo "Good Morning! ".'<span class="text-lime-500">'.$usares['fname'].'</span>';
        } else if ((date("H") >= 12) && (date("H") < 17)) {
            echo "Good Afternoon! ".'<span class="text-lime-500">'.$usares['fname'].'</span>';
        } else if (date("H") >= 17) {
            echo "Good Evening! ".'<span class="text-lime-500">'.$usares['fname'].'</span>';
        }
        ?>
    </h1>
    <div class="flex flex-wrap gap-4 items-center text-stone-500 dark:text-stone-400 transform delay-300 select-none">
        <p class="flex gap-2">
            <i class="fad fa-calendar-week fa-swap-opacity text-lime-600"></i> <?php echo date('d') . 'th ' . date('F') . ' ' . date('Y') . ' | ' . date('l') ?>
        </p>
        <p class="flex gap-2 ls-2">
            <i class="fad fa-clock fa-swap-opacity text-lime-600"></i>
            <span id="time" class="">
                <?php
                date_default_timezone_set('Asia/Kathmandu');
                $time = date("g") . '<span class="animate-pulse font-semibold"> : </span>' . date("i A");
                echo $time;
                ?>
            </span>
        </p>
    </div>
</div>
<script>
    setInterval(function() {
        $.ajax({
            url: "<?php echo $site ?>js/ajax/time.php",
            success: function(response) {
                $('#time').html(response);
            }
        });
    }, 1000)
</script>