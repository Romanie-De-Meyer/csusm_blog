<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Establish connection to your MySQL database
$servername = "localhost";
$username = "team_2";
$password = "8xkm98eb";
$dbname = "team_2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    // Query to retrieve articles with category ID 2 from the 'articles' table
    $sql = "SELECT title, body FROM articles WHERE category = 3";
    $result = $conn->query($sql);

    if ($result) {
        // Initialize an array to store the articles
        $articles = array();

        // Fetch associative array of articles
        while($row = $result->fetch_assoc()) {
            // Add each article to the array
            $articles[] = $row;
        }

        // Set the Content-Type header to indicate JSON response
        header('Content-Type: application/json');

        // Convert the array to JSON format and output it
        echo json_encode(array('articles' => $articles));
    } else {
        // Handle SQL query execution error
        throw new Exception("Query execution failed: " . mysqli_error($conn));
    }
} catch (Exception $e) {
    // Handle other exceptions
    echo json_encode(array('error' => $e->getMessage()));
}

// Close the connection
$conn->close();
?>
