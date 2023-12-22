<?php
include("db_con.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the image file name from the database
    $sql = "SELECT `imgURL` FROM `ShowDetails` WHERE `id` = ?";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $file_name = $result['imgURL'];

        // Delete the file from the server
        $file_path = "uploads/" . $file_name;
        if (file_exists($file_path)) {
            unlink($file_path);
        } else {
            echo "File not found on the server.";
        }

        // Delete the record from the database
        $sql_delete = "DELETE FROM `ShowDetails` WHERE `id` = ?";
        $stmt_delete = $db->prepare($sql_delete);
        $stmt_delete->bindParam(1, $id);

        if ($stmt_delete->execute()) {
            header("Location: index.php");
        } else {
            echo "Failed to delete record from the database.";
        }
    } else {
        echo "Image record not found.";
    }
} else {
    echo "Invalid request.";
}
?>
