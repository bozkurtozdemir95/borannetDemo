<?php
    include("../includes/dbh.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM reservations WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1) {
        header("Location: ../reservations.php?deleted");
        exit();
    } else{
        header("Location: ../reservations.php?error=delete");
        exit();
    }
