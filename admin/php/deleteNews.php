<?php
    include("../includes/dbh.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM news WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1) {
        header("Location: ../news.php?deleted");
        exit();
    } else{
        header("Location: ../news.php?error=delete");
        exit();
    }
