<?php

session_start();

if (isset($_POST['submit'])) {
    include '../includes/dbh.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $gameName = mysqli_real_escape_string($conn, $_POST['game_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $nickname = mysqli_real_escape_string($conn, $_POST['nickname']);
    $mail = mysqli_real_escape_string($conn, $_POST['mail']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (empty($name)) {
        header("Location: ../../index.php#games");
        exit();
    } else {
        
        $sql = "INSERT INTO reservations (name, game_name, phone, nickname, mail, description) VALUES ('$name', '$gameName', '$phone', '$nickname', '$mail', '$message')";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../../index.php#games");
            exit();
        }
    }
} else {
    header("Location: ../../index.php#games");
    exit();
}