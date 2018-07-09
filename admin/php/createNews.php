<?php

session_start();




if (isset($_POST['submit'])) {
    include '../includes/dbh.php';

    $title = mysqli_real_escape_string($conn, $_POST['newsTitle']);
    $desc = mysqli_real_escape_string($conn, $_POST['newsDesc']);

    if (empty($title) || empty($desc)) {
        header("Location: ../news.php?empty");
        exit();
    } else {

        $target_dir = "../img/news/";
        $target_file = $target_dir.basename($_FILES["newsImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["newsImg"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - ".$check["mime"].
                ".";
                $uploadOk = 1;
                if (move_uploaded_file($_FILES["newsImg"]["tmp_name"], $target_file)) {
                    echo "The file ".basename($_FILES["newsImg"]["name"]).
                    " has been uploaded.";
                    
                    $fileName = basename($_FILES["newsImg"]["name"]);
                    $fileDestination = "img/news/" .$fileName;
                    $sql = "INSERT INTO news (title, description, img_url) VALUES ('$title', '$desc', '$fileDestination')";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck < 1) {
                        header("Location: ../news.php?success");
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
    header("Location: ../news.php");
    exit();
}