<?php
    include("../includes/dbh.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM messages WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1) {
        header("Location: ../messages.php?deleted");
        exit();
    } else{
        header("Location: ../messages.php?error=delete");
        exit();
    }
