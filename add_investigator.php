<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $assigned_case = $_POST['assigned_case'];

    $sql = "INSERT INTO Investigator (Name, Contact_info, Assigned_case) 
            VALUES ('$name', '$contact_info', '$assigned_case')";

    if ($conn->query($sql) === TRUE) {
        echo "New investigator added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
