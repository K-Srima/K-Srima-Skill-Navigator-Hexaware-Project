<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file was uploaded
if ($_FILES["file"]["error"] != UPLOAD_ERR_OK) {
    echo "File upload error!";
    $uploadOk = 0;
}

// Check file size (5MB limit)
if ($_FILES["file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
$allowedTypes = array("jpg", "jpeg", "png", "pdf", "docx");
if (!in_array($fileType, $allowedTypes)) {
    echo "Sorry, only JPG, JPEG, PNG, PDF, & DOCX files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// If everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        header("Location: index.html"); // Redirect back to the file upload page
        exit();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>