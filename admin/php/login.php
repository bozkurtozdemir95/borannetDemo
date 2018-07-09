<?php

session_start();

if(isset($_POST['submit'])){
    include '../includes/dbh.php';

    $uid = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($uid)){
        header("Location: ../login.php?error");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid='$uid' AND user_pwd='$pwd'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck < 1){
            header("Location: ../login.php?login=error");
            exit();
        } else {
            if($row = mysqli_fetch_assoc($result)){
                $_SESSION['u_id'] = $row['user_uid'];
                header("Location: ../index.php");
                exit();
            }
        }

    }
} else{
    header("Location: ../login.php?assdasd");
    exit();
}
