<?php
include 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $personal_details = $_POST['personal_details'];
    $case_id = $_POST['case_id'];

    try {
        // Prepare the SQL query to insert suspect data
        $sql = "INSERT INTO Suspect (Name, Personal_details, Case_ID) 
                VALUES ('$name', '$personal_details', $case_id)";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New suspect added successfully.');</script>";
        } else {
            throw new Exception($conn->error);
        }
    } catch (Exception $e) {
        // Check if the error is due to the trigger
        if (strpos($e->getMessage(), 'Duplicate suspect entry detected!') !== false) {
            echo "<script>alert('Error: Duplicate suspect entry detected!');</script>";
        } else {
            // General error handling
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
    } finally {
        $conn->close(); // Close the database connection
    }
}
?>
