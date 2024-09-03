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
  <title>Skill Navigator - Admin Login</title>
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

/* Login Section */
.login-section {
    max-width: 500px;
    margin: 100px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.login-section h1 {
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

.form-group input[type="text"],
.form-group input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
}

.submit-btn {
    display: block;
    text-align: center;
    padding: 15px;
    background-color: #0073e6;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-size: 1rem;
    margin: 0 auto;
    width: 200px;
    border: none;
    cursor: pointer;
}

.submit-btn:hover {
    background-color: #005bb5;
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
    </nav>
  </header>

  <main>
    <section class="login-section">
      <h1>Admin Login</h1>
     <form id="login-form">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit" class="submit-btn"><a href="admin dashboard.html">Login</a></button>
</form>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 Skill Navigator. All rights reserved.</p>
  </footer>

  <script src="script.js">document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('login-form');

    loginForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        if (!username || !password) {
            alert('Please fill out both fields.');
            return;
        }

        // For demonstration purposes, display a success message
        alert(Login successful!\n\nUsername: ${username});

        // Redirect to the admin dashboard
        window.location.href = 'admin dashboard.html'; // Replace with the correct path to the dashboard
    });
});</script>
</body>
</html>
<?php
$conn->close();
?>