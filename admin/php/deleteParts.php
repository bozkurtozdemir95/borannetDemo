<?php
    include("../includes/dbh.php");

    $id = $_GET['id'];

    $sql = "DELETE FROM pc_parts WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck < 1) {
        header("Location: ../computer-parts.php?deleted");
        exit();
    } else{
        header("Location: ../computer-parts.php?error=delete");
        exit();
    }
