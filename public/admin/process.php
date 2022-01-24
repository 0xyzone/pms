<?php
session_start();
include '../includes/dbconnection.php';
include '../includes/globalvar.php';
?>
<?php
if ($_POST){
    if (isset($_POST['uname']) && isset($_POST['pw'])){
        $uname = $_POST['uname'];
        $pw = $_POST['pw'];
        $query = mysqli_query($db, "SELECT * FROM userbase WHERE username='".$uname."' AND password='".$pw."'");
        $numrows = mysqli_num_rows($query);
        if ($numrows == 0){
            $_SESSION['error'] = "Username or password incorrect! Please try again!";
            header('Location: '.$site.'admin');
        }
        if ($numrows != 0){
            while($row=mysqli_fetch_assoc($query)){
                $dbuser = $row['username'];
                $dbpass = $row['password'];
                $dbrole = $row['role'];
            }
            if(($uname == $dbuser) && ($pw == $dbpass)){
                $_SESSION['dh_user'] = $dbuser;
                $_SESSION['dh_user_role'] = $dbrole;
                $db->query("UPDATE userbase SET status='Online' WHERE username='$dbuser'");
                $_SESSION['success'] = "Logged in successfully";
                header('location:'.$site);
                unset($_SESSION['error']);
            } else {
                $_SESSION['error'] = "Username or password incorrect! Please try again!";
            }
        }
    }
}
?>