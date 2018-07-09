<?php
    include("../includes/dbh.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM album WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1) {
        header("Location: ../album.php?deleted");
        exit();
    } else{
        header("Location: ../album.php?error=delete");
        exit();
    }
