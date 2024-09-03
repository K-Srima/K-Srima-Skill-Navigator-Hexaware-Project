<?php
// Load the profile data from the JSON file
$dataFile = 'data/profile_data.json';
$profileData = [];

if (file_exists($dataFile)) {
    $jsonData = file_get_contents($dataFile);
    $profileData = json_decode($jsonData, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style type="text/css">body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;
    max-width: 600px;
    background-color: white;
    padding: 20px;
    margin: 50px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.form-group,
.profile-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="url"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    width: 100%;
    padding: 10px;
    background-color:
}</style>
    <div class="container">
        <h2>Your Profile</h2>
        <div class="profile-group">
            <strong>Name:</strong> <span id="profileName"></span>
        </div>
        <div class="profile-group">
            <strong>Email ID:</strong> <span id="profileEmail"></span>
        </div>
        <div class="profile-group">
            <strong>Degree:</strong> <span id="profileDegree"></span>
        </div>
        <div class="profile-group">
            <strong>Specialization:</strong> <span id="profileSpecialization"></span>
        </div>
        <div class="profile-group">
            <strong>Phone Number:</strong> <span id="profilePhone"></span>
        </div>
        <div class="profile-group">
            <strong>Certifications:</strong> <span id="profileCertifications"></span>
        </div>
        <div class="profile-group">
            <strong>Internship Details:</strong> <span id="profileInternship"></span>
        </div>
        <div class="profile-group">
            <strong>Courses Completed:</strong> <span id="profileCourses"></span>
        </div>
        <div class="profile-group">
            <strong>LinkedIn Profile:</strong> <span id="profileLinkedIn"></span>
        </div>
        <div class="profile-group">
            <strong>GitHub Profile:</strong> <span id="profileGithub"></span>
        </div>
        <div class="profile-group">
            <strong>Programming Languages Known:</strong> <span id="profileProgramming"></span>
        </div>
        <div class="auth-buttons">
        <button><a href="candidate dashboard.html" class="login-btn">Continue to Dashboard</a></button>
    </div>
    </div>
    <script src="profile.js">document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('profileName').textContent = localStorage.getItem('name');
    document.getElementById('profileEmail').textContent = localStorage.getItem('email');
    document.getElementById('profileDegree').textContent = localStorage.getItem('degree');
    document.getElementById('profileSpecialization').textContent = localStorage.getItem('specialization');
    document.getElementById('profilePhone').textContent = localStorage.getItem('phone');
    document.getElementById('profileCertifications').textContent = localStorage.getItem('certifications');
    document.getElementById('profileInternship').textContent = localStorage.getItem('internship');
    document.getElementById('profileCourses').textContent = localStorage.getItem('courses');
    document.getElementById('profileLinkedIn').textContent = localStorage.getItem('linkedin');
    document.getElementById('profileGithub').textContent = localStorage.getItem('github');
    document.getElementById('profileProgramming').textContent = localStorage.getItem('programming');
});</script>
</body>
</html>