<?php
if ($_POST){
    session_start();
    include '../dbconnection.php';
    include '../globalvar.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mno = $_POST['mobile'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $uname = $_POST['uname'];
    $update = $db->query("UPDATE profile SET fname='$fname', lname='$lname', email='$email', mno='$mno', street='$street', city='$city' WHERE uname='$uname'");

    $_SESSION['success'] = "Profile updated successfully!";
    header('location: '.$site.'?profile='.$uname);
}
