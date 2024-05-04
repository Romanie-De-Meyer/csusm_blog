<?php
// Establish connection to your MySQL database
$servername = "34.82.84.24";
$username = "test";
$password = "password";
$dbname = "misc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve all articles from the 'articles' table
$sql = "SELECT title, content FROM articles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize an array to store the articles
    $articles = array();

    // Fetch associative array of articles
    while($row = $result->fetch_assoc()) {
        // Add each article to the array
        $articles[] = $row;
    }

    // Convert the array to JSON format and output it
    echo json_encode($articles);
} else {
    echo json_encode(array()); // Return empty array if no results
}

// Close the connection
$conn->close();
?>
