<?php
include 'config.php'; // Include the database connection

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $investigator_id = $_POST['investigator_id'];

    // SQL query to insert data into the `Case` table
    $sql = "INSERT INTO `Case` (Title, Description, Status, Investigator_ID) 
            VALUES ('$title', '$description', '$status', '$investigator_id')";

    if ($conn->query($sql) === TRUE) {
        echo "New case added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close(); // Close the database connection
?>
