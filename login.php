<?php
session_start(); // Start the session
include 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the investigator ID from the form
    $investigator_id = $_POST['investigator_id'];

    // Check if the investigator ID is provided
    if (!empty($investigator_id)) {
        // Query the database to validate the investigator ID
        $sql = "SELECT * FROM Investigator WHERE Investigator_ID = ?";
        $stmt = $conn->prepare($sql); // Use prepared statements to prevent SQL injection
        $stmt->bind_param("i", $investigator_id); // Bind the investigator ID as an integer
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Investigator ID found, start session and redirect to the dashboard
            $_SESSION['investigator_id'] = $investigator_id;
            header("Location: dashboard.php");
            exit;
        } else {
            // Investigator ID not found
            echo "<p style='color: red; text-align: center;'>Invalid Investigator ID!</p>";
            echo "<p style='text-align: center;'><a href='index.html'>Back to Login</a></p>";
        }

        $stmt->close(); // Close the prepared statement
    } else {
        // Investigator ID not provided
        echo "<p style='color: red; text-align: center;'>Please enter an Investigator ID.</p>";
        echo "<p style='text-align: center;'><a href='index.html'>Back to Login</a></p>";
    }

    $conn->close(); // Close the database connection
}
?>
