php

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("db_con.php");

if (isset($_FILES['image'])) {
    savePostWithImage($db);
}

function savePostWithImage($db)
{
    $errors = array();

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp_name = $_FILES['image']['tmp_name'];

    // No specific extension check, allowing any file type
    // $file_parts = explode('.', $file_name);
    // $file_ext = strtolower(end($file_parts));
    // $extensions = array("jpeg", "jpg", "png", "GIF", "BMP", "AI", "PSD", "SVG", "WEBP");
    // if (in_array($file_ext, $extensions) === false) {
    //     $errors[] = "This file type is not allowed to upload";
    // }

    if ($file_size > 6000000) {
        $errors[] = "This file is too large; it should be less than 6 MB";
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp_name, "uploads/" . $file_name);
    } else {
        print_r($errors);
        die();
    }

    $title = htmlspecialchars($_POST["title"]);
    $description = htmlspecialchars($_POST["description"]);

    $sql = "INSERT INTO `ShowDetails`(`title`,`description`,`imgURL`) VALUES (?,?,?)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $title);
    $stmt->bindParam(2, $description);
    $stmt->bindParam(3, $file_name);

    if ($stmt->execute()) {
        header("Location: index.php");
    }
}
?>
