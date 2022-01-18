<?php
include "globalvar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo $site; ?>css/tailwind.css">
    <link rel="stylesheet" href="<?php echo $site; ?>css/all.css">
    <title>
        <?php
        if (isset($title)){
            echo $title;
        } else {
            echo "No Title inserted!";
        }
        ?>
    </title>
</head>
<body class="w-screen h-screen">