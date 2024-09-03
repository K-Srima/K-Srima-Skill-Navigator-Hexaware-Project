<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define upload directory
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Handle file uploads
    $uploadFiles = ['uploadCertifications', 'uploadInternship', 'uploadCourses'];
    foreach ($uploadFiles as $fileInputName) {
        if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES[$fileInputName]['tmp_name'];
            $fileName = basename($_FILES[$fileInputName]['name']);
            $uploadFile = $uploadDir . $fileName;

            if (move_uploaded_file($tmpName, $uploadFile)) {
                echo "<p>Uploaded $fileName successfully.</p>";
            } else {
                echo "<p>Failed to upload $fileName.</p>";
            }
        }
    }

    // Store other form data
    $data = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'degree' => $_POST['degree'],
        'specialization' => $_POST['specialization'],
        'phone' => $_POST['phone'],
        'certifications' => $_POST['certifications'],
        'internship' => $_POST['internship'],
        'courses' => $_POST['courses'],
        'linkedin' => $_POST['linkedin'],
        'github' => $_POST['github'],
        'programming' => $_POST['programming']
    ];

    // Save data to a file (for example, JSON format)
    $dataFile = 'data/profile_data.json';
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));

    // Redirect to profile display page
    header('Location: profiledisplay.html');
    exit;
}
?>