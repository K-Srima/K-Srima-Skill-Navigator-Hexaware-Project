<?php
// Include database connection file
require_once 'C:\xampp\htdocs\skill navigator\php\db_connection.php'; // Adjust the path as needed

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $course = $_POST['course'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    // Prepare SQL query
    $sql = "INSERT INTO feedback (course, rating, feedback) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $course, $rating, $feedback);

    // Execute the query
    if ($stmt->execute()) {
        header("Location: feedback_submitted_page.html"); // Redirect to the feedback submitted page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skill Navigator - Feedback</title>
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
    justify-content: space-between;
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
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
}

nav ul li a:hover {
    text-decoration: underline;
}

.auth-buttons {
    display: flex;
    gap: 10px;
}

.auth-buttons .login-btn {
    background-color: #ff5722;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
}

.auth-buttons a:hover {
    opacity: 0.9;
}

/* Feedback Section */
.feedback-section {
    max-width: 900px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.feedback-section h1 {
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
.form-group input[type="email"],
.form-group input[type="password"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
}

.form-group input[type="file"] {
    padding: 3px;
}

.rating-stars {
    display: flex;
    gap: 5px;
    font-size: 1.5rem;
}

.rating-stars input[type="radio"] {
    display: none;
}

.rating-stars label {
    cursor: pointer;
    color: #ffd700;
}

.rating-stars input[type="radio"]:checked ~ label {
    color: #ff0;
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
      <ul>
        <li><a href="Homepage.html">Home</a></li>
        <li><a href="explore.html">Explore</a></li>
        <li><a href="candidate dashboard.html">Dashboard</a></li>
        <li><a href="profile.html">Profile</a></li>
      </ul>
      <div class="auth-buttons">
        <a href="Homepage.html" class="login-btn">Logout</a>
      </div>
    </nav>
  </header>

  <main>
    <section class="feedback-section">
      <h1>Provide Feedback</h1>
      <form id="feedback-form">
        <div class="form-group">
          <label for="course">Course:</label>
          <select id="course" name="course" required>
            <option value="">Select a course</option>
            <option value="web-dev">Web Development Fundamentals</option>
            <option value="data-analysis">Introduction to Data Analysis</option>
            <option value="digital-marketing">Digital Marketing Strategies</option>
          </select>
        </div>
        <div class="form-group">
          <label for="rating">Rating:</label>
          <div class="rating-stars">
            <input type="radio" id="rating-5" name="rating" value="5" required>
            <label for="rating-5">&#9733;</label>
            <input type="radio" id="rating-4" name="rating" value="4" required>
            <label for="rating-4">&#9733;</label>
            <input type="radio" id="rating-3" name="rating" value="3" required>
            <label for="rating-3">&#9733;</label>
            <input type="radio" id="rating-2" name="rating" value="2" required>
            <label for="rating-2">&#9733;</label>
            <input type="radio" id="rating-1" name="rating" value="1" required>
            <label for="rating-1">&#9733;</label>
          </div>
        </div>
        <div class="form-group">
          <label for="feedback">Feedback:</label>
          <textarea id="feedback" name="feedback" rows="5" required></textarea>
        </div>
        <button type="submit" class="submit-btn"><a href="feedback submitted page.html" >Submit Feedback</a></button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 Skill Navigator. All rights reserved.</p>
  </footer>

  <script src="script.js">document.addEventListener('DOMContentLoaded', function () {
    const feedbackForm = document.getElementById('feedback-form');

    feedbackForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission

        const course = document.getElementById('course').value;
        const rating = document.querySelector('input[name="rating"]:checked');
        const feedback = document.getElementById('feedback').value;

        if (!course || !rating || !feedback) {
            alert('Please fill out all fields.');
            return;
        }

        // Display a confirmation message or handle the form data
        alert(Thank you for your feedback!\n\nCourse: ${course}\nRating: ${rating.value}\nFeedback: ${feedback});

        // Optionally, you could reset the form here
        feedbackForm.reset();
    });
});</script>
</body>
</html>