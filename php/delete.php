<?php
$target_dir = "uploads/";
$file = $target_dir . basename($_POST["file"]);

// Check if the file exists and delete it
if (file_exists($file)) {
    if (unlink($file)) {
        header("Location: index.html"); // Redirect back to the file upload page
        exit();
    } else {
        echo "Error deleting file.";
    }
} else {
    echo "File does not exist.";
}
?>