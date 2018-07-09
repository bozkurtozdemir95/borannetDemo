<?php

session_start();




if (isset($_POST['submit'])) {
    include '../includes/dbh.php';

    $title = mysqli_real_escape_string($conn, $_POST['partsTitle']);
    $desc = mysqli_real_escape_string($conn, $_POST['partsDesc']);
    $price = mysqli_real_escape_string($conn, $_POST['partsPrice']);

    if (empty($title) || empty($desc)) {
        header("Location: ../computer-parts.php?empty");
        exit();
    } else {

        $target_dir = "../img/parts/";
        $target_file = $target_dir.basename($_FILES["partsImg"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["partsImg"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - ".$check["mime"].
                ".";
                $uploadOk = 1;
                if (move_uploaded_file($_FILES["partsImg"]["tmp_name"], $target_file)) {
                    echo "The file ".basename($_FILES["partsImg"]["name"]).
                    " has been uploaded.";
                    
                    $fileName = basename($_FILES["partsImg"]["name"]);
                    $fileDestination = "img/parts/" .$fileName;
                    $sql = "INSERT INTO pc_parts (product_name, product_img, product_desc, product_price) VALUES ('$title', '$fileDestination', '$desc', '$price')";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck < 1) {
                        header("Location: ../computer-parts.php?success");
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
    header("Location: ../computer-parts.php");
    exit();
}