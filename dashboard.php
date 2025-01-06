<?php
session_start();

// Check if the investigator ID is stored in the session
if (!isset($_SESSION['investigator_id'])) {
    // Redirect to the homepage if the investigator is not logged in
    header("Location: index.html");
    exit;
}

$investigator_id = $_SESSION['investigator_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investigator Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header class="header">
            <h1>Welcome Investigator <?php echo $investigator_id; ?>!</h1>
        </header>

        <!-- Navigation Section -->
        <ul class="navigation">
            <li><a href="add_case_form.html">Add a New Case</a></li>
            <li><a href="view_cases.php">View All Cases</a></li>
            <li><a href="add_investigator_form.html">Add Investigator</a></li>
            <li><a href="add_crimescene_form.html">Add CrimeScene</a></li>
            <li><a href="view_crimescenes.php">View CrimeScene</a></li>
            <li><a href="add_evidence_form.html">Add Evidence</a></li>
            <li><a href="view_evidence.php">View Evidence</a></li>
            <li><a href="add_forensic_report_form.html">Add Forensic Reports</a></li>
            <li><a href="view_forensic_reports.php">View Forensic Reports</a></li>
            <li><a href="add_suspect_form.html">Add Suspects</a></li>
            <li><a href="view_suspects.php">View Suspects</a></li>
        </ul>

        <!-- Logout Button -->
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
