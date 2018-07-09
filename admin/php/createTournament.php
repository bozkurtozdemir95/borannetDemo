<?php

session_start();




if (isset($_POST['submit'])) {
    include '../includes/dbh.php';

    $tournamentName = mysqli_real_escape_string($conn, $_POST['tournamentName']);
    $gameName = mysqli_real_escape_string($conn, $_POST['gameName']);
    $tournamentDesc = mysqli_real_escape_string($conn, $_POST['tournamentDesc']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $enterPrice = mysqli_real_escape_string($conn, $_POST['enterPrice']);
    $award = mysqli_real_escape_string($conn, $_POST['award']);

    if (empty($tournamentName) || empty($gameName) || empty($tournamentDesc) || empty($date)) {
        header("Location: ../tournaments.php?empty");
        exit();
    } else {

        $target_dir = "../img/tournament/";
        $target_file = $target_dir.basename($_FILES["tournamentImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["tournamentImg"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - ".$check["mime"].
                ".";
                $uploadOk = 1;
                if (move_uploaded_file($_FILES["tournamentImg"]["tmp_name"], $target_file)) {
                    echo "The file ".basename($_FILES["tournamentImg"]["name"]).
                    " has been uploaded.";
                    
                    $fileName = basename($_FILES["tournamentImg"]["name"]);
                    $fileDestination = "img/tournament/" .$fileName;
                    $sql = "INSERT INTO tournaments (name, img_url, description, game_name, date, enter_price, award) VALUES ('$tournamentName', '$fileDestination', '$tournamentDesc', '$gameName', '$date', '$enterPrice', '$award')";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck < 1) {
                        header("Location: ../tournaments.php?success");
                        exit();
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }


    }
} else {
    header("Location: ../tournaments.php");
    exit();
}