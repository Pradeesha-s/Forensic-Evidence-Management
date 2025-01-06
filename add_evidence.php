<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $evidence_type = $_POST['evidence_type'];
    $description = $_POST['description'];
    $collection_date = $_POST['collection_date'];
    $storage_location = $_POST['storage_location'];
    $case_id = $_POST['case_id'];

    $sql = "INSERT INTO Evidence (Evidence_type, Description, Collection_date, Storage_location, Case_ID) 
            VALUES ('$evidence_type', '$description', '$collection_date', '$storage_location', $case_id)";

    if ($conn->query($sql) === TRUE) {
        echo "New evidence added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
