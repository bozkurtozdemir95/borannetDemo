<?php
    include("../includes/dbh.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM tournaments WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1) {
        header("Location: ../tournaments.php?deleted");
        exit();
    } else{
        header("Location: ../tournaments.php?error=delete");
        exit();
    }
