<?php
include 'config.php'; // Include database configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_date = $_POST['report_date'];
    $author = $_POST['author'];
    $evidence_id = $_POST['evidence_id'];
    $analysis_result = $_POST['analysis_result'];

    // SQL query to insert forensic report
    $sql = "INSERT INTO ForensicReport (Report_date, Author, Evidence_ID, Analysis_result) 
            VALUES ('$report_date', '$author', $evidence_id, '$analysis_result')";

    if ($conn->query($sql) === TRUE) {
        echo "New forensic report added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Close the database connection
}
?>
