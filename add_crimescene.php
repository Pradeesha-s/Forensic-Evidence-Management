<?php
include 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $description = $_POST['description'];
    $evidence_id = $_POST['evidence_id'];

    // SQL query to insert crime scene data
    $sql = "INSERT INTO CrimeScene (Location, Description, Evidence_ID) 
            VALUES ('$location', '$description', $evidence_id)";

    if ($conn->query($sql) === TRUE) {
        echo "New crime scene added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Close the database connection
}
?>
