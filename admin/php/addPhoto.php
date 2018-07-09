<?php

session_start();




if (isset($_POST['submit'])) {
    include '../includes/dbh.php';

    $photoTitle = mysqli_real_escape_string($conn, $_POST['photoTitle']);

    if (empty($photoTitle)) {
        header("Location: ../album.php?empty");
        exit();
    } else {

        $target_dir = "../img/album/";
        $target_file = $target_dir.basename($_FILES["albumImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["albumImg"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - ".$check["mime"].
                ".";
                $uploadOk = 1;
                if (move_uploaded_file($_FILES["albumImg"]["tmp_name"], $target_file)) {
                    echo "The file ".basename($_FILES["albumImg"]["name"]).
                    " has been uploaded.";
                    
                    $fileName = basename($_FILES["albumImg"]["name"]);
                    $fileDestination = "img/album/" .$fileName;
                    $sql = "INSERT INTO album (photo_name, photo_url) VALUES ('$photoTitle', '$fileDestination')";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck < 1) {
                        header("Location: ../album.php?success");
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
    header("Location: ../album.php");
    exit();
}