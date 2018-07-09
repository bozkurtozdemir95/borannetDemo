<?php

session_start();

if (isset($_POST['submit'])) {
    include '../includes/dbh.php';

    $oldPassword = mysqli_real_escape_string($conn, $_POST['oldPassword']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);
    $username = mysqli_real_escape_string($conn, $_SESSION['u_id']);

    if (empty($oldPassword) || empty($password1) || empty($password2)) {
        header("Location: ../settings.php?empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid='$username' AND user_pwd='$oldPassword'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../settings.php?wrongpwd");
            exit();
        } else {
            if ($password1 != $password2) {
                header("Location: ../settings.php?notSame");
            } else{
                $sql = "UPDATE users SET user_pwd='$password2' WHERE user_uid='$username' ";
                $result = mysqli_query($conn, $sql);
                $resultCheck2 = mysqli_num_rows($result);

                if ($resultCheck2 < 1) {
                    header("Location: ../settings.php?success");
                    exit();
                } 

            }
        }
    }
} else {
    header("Location: ../settings.php");
    exit();
}