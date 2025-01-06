<?php
include 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $assigned_case = $_POST['assigned_case'] ?? NULL;

    // SQL to insert investigator details
    $sql = "INSERT INTO Investigator (Name, Contact_info, Assigned_case) 
            VALUES ('$name', '$contact_info', '$assigned_case')";

    if ($conn->query($sql) === TRUE) {
        echo "Sign-up successful! Your Investigator ID is: " . $conn->insert_id;
        echo "<br><a href='index.html'>Back to Login</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Close the database connection
}
?>
