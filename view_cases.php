<?php
session_start();

// Check if the investigator ID is stored in the session
if (!isset($_SESSION['investigator_id'])) {
    // Redirect to the homepage if the investigator is not logged in
    header("Location: index.html");
    exit;
}

$investigator_id = $_SESSION['investigator_id'];

// Database connection
$servername = "localhost";  // Your database server
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "forensic_db";     // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Query to fetch cases related to the logged-in investigator
$sql = "SELECT * FROM `Case` WHERE Investigator_ID = '$investigator_id'"; // Use backticks around `Case`
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cases</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Centering the table */
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;">Cases Assigned to Investigator ID: <?php echo $investigator_id; ?></h1>

        <?php
        // Check if there are any cases for the investigator
        if ($result->num_rows > 0) {
            // Start the table
            echo "<table>
                    <tr>
                        <th>Case ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>";
            
            // Output the data of each row in a table row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['Case_ID'] . "</td>
                        <td>" . $row['Title'] . "</td>
                        <td>" . $row['Description'] . "</td>
                        <td>" . $row['Status'] . "</td>
                    </tr>";
            }
            
            // End the table
            echo "</table>";
        } else {
            echo "<p style='text-align: center;'>No cases found for this investigator.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>