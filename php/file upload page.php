<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include 'C:\xampp\htdocs\skill navigator\php\db_connection.php';

$sql = "SELECT * FROM batches";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skill Navigator - File Upload</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <style type="text/css">/* General Styles */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #0073e6;
    color: white;
    padding: 15px 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

nav {
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

nav .logo a {
    font-size: 1.5rem;
    color: white;
    text-decoration: none;
    font-weight: bold;
}

nav ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin: 0 10px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
}

nav ul li a:hover {
    text-decoration: underline;
}

/* File Upload Section */
.file-upload {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.file-upload h1 {
    text-align: center;
    font-size: 2rem;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-size: 1rem;
    margin-bottom: 5px;
}

.form-group input[type="file"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.submit-btn {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    color: white;
    background-color: #0073e6;
    text-align: center;
    margin-top: 10px;
}

.submit-btn:hover {
    opacity: 0.9;
}

.uploaded-files {
    margin-top: 30px;
}

.uploaded-files h2 {
    font-size: 1.5rem;
    margin-bottom: 15px;
}

.uploaded-files ul {
    list-style: none;
    padding: 0;
}

.uploaded-files ul li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #ddd;
}

.uploaded-files ul li .file-link {
    color: #0073e6;
    text-decoration: none;
    font-size: 1rem;
}

.uploaded-files ul li .file-link:hover {
    text-decoration: underline;
}

.delete-btn {
    background-color: #e74c3c;
    border: none;
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 0.875rem;
}

.delete-btn:hover {
    opacity: 0.9;
}

/* Footer */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
    margin-top: 50px;
}

footer p {
    margin: 0;
}</style>
  <header>
    <nav>
      <div class="logo">
        <a href="index.html">Skill Navigator</a>
      </div>
      <ul>
        <li><a href="admin dashboard.html">Dashboard</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="admin login page.html">Logout</a></li>
        <li><a href="settings page.html">Settings</a></li>
        <li><a href="helpFAQ page.html">Help</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="file-upload">
      <h1>File Upload</h1>
      <form id="file-upload-form" method="POST" enctype="multipart/form-data" action="upload.php">
        <div class="form-group">
          <label for="file">Upload File:</label>
          <input type="file" id="file" name="file" required>
        </div>
        <div class="form-group">
          <label for="file-description">File Description:</label>
          <textarea id="file-description" name="file-description" rows="3" required></textarea>
        </div>
        <button type="submit" class="submit-btn">Upload File</button>
      </form>
      <div class="uploaded-files">
        <h2>Uploaded Files</h2>
        <ul>
          <li>
            <a href="#" class="file-link">Certificate of Completion.pdf</a>
            <button class="delete-btn">Delete</button>
          </li>
          <li>
            <a href="#" class="file-link">Resume.docx</a>
            <button class="delete-btn">Delete</button>
          </li>
        </ul>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 Skill Navigator. All rights reserved.</p>
  </footer>

  <script src="script.js">document.addEventListener('DOMContentLoaded', function () {
    const fileUploadForm = document.getElementById('file-upload-form');
    const fileInput = document.getElementById('file');
    const fileDescription = document.getElementById('file-description');
    const uploadedFilesList = document.querySelector('.uploaded-files ul');

    // Handle form submission
    fileUploadForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const file = fileInput.files[0];
        const description = fileDescription.value;

        if (file && description) {
            const listItem = document.createElement('li');
            const fileLink = document.createElement('a');
            const deleteBtn = document.createElement('button');

            fileLink.href = URL.createObjectURL(file);
            fileLink.textContent = file.name;
            fileLink.classList.add('file-link');
            fileLink.target = '_blank';

            deleteBtn.textContent = 'Delete';
            deleteBtn.classList.add('delete-btn');
            deleteBtn.addEventListener('click', function () {
                listItem.remove();
            });

            listItem.appendChild(fileLink);
            listItem.appendChild(deleteBtn);
            uploadedFilesList.appendChild(listItem);

            fileUploadForm.reset();
        } else {
            alert('Please select a file and provide a description.');
        }
    });
});</script>
</body>
</html>
<?php
$conn->close();
?>