<?php

session_start();

if (isset($_POST['submit'])) {
    include '../includes/dbh.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mail = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (empty($name) || empty($mail) || empty($message)) {
        header("Location: ../../index.php#contact");
        exit();
    } else {
        
        $sql = "INSERT INTO messages (name, mail, message) VALUES ('$name', '$mail', '$message')";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../../index.php#contact");
            exit();
        }
    }
} else {
    header("Location: ../../index.php#contact");
    exit();
}