<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Forensic Reports</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>All Forensic Reports</h1>
        <?php
        include 'config.php'; // Include database configuration

        // SQL to fetch forensic report data
        $sql = "SELECT * FROM ForensicReport";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1' style='width: 100%; text-align: left;'>";
            echo "<thead>
                    <tr>
                        <th>Report ID</th>
                        <th>Report Date</th>
                        <th>Author</th>
                        <th>Evidence ID</th>
                        <th>Analysis Result</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Report_ID'] . "</td>";
                echo "<td>" . $row['Report_date'] . "</td>";
                echo "<td>" . $row['Author'] . "</td>";
                echo "<td>" . $row['Evidence_ID'] . "</td>";
                echo "<td>" . $row['Analysis_result'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No forensic reports found.</p>";
        }

        $conn->close(); // Close the database connection
        ?>
        <a href="index.html">Back to Home</a>
    </div>
</body>
</html>
