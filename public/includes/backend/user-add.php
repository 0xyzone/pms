<!-- User adding process -->
<?php
session_start();
include '../../includes/dbconnection.php';
include '../../includes/globalvar.php';
if ($_POST) {
    $status = "Offline";
    $uname = $_POST['uname'];
    $pw = $_POST['pw'];
    $role = $_POST['role'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $street = $_POST['street'];
    $city = $_POST['city'];

    $query = mysqli_query($db, "SELECT * FROM userbase WHERE username='$uname'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['error'] = "User already exisits!";
        header('Location: '.$site.'?option=adduser');
    } else {

        $stmt = $db->prepare('INSERT INTO userbase(username, password, role, status) VALUES(?, ?, ?, ?)');
        $stmt->bind_param('ssss', $uname, $pw, $role, $status);
        $stmt->execute();
        $stmt->close();
        
        $stmt2 = $db->prepare('INSERT INTO profile(fname, lname, uname, dob, email, mno, street, city) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt2->bind_param('ssssssss', $fname, $lname, $uname, $dob, $email, $mobile, $street, $city);
        $stmt2->execute();
        $stmt2->close();

        $db->close();

        $_SESSION['success'] = "User Added successfully";
        header('Location: '.$site.'?option=adduser');
    }
}
?>
<!-- end User adding process -->