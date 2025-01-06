<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Crime Scenes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>All Crime Scenes</h1>
        <?php
        include 'config.php'; // Include database configuration

        // SQL query to fetch crime scene data
        $sql = "SELECT * FROM CrimeScene";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1' style='width: 100%; text-align: left;'>";
            echo "<thead>
                    <tr>
                        <th>Scene ID</th>
                        <th>Location</th>
                        <th>Description</th>
                        <th>Evidence ID</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Scene_ID'] . "</td>";
                echo "<td>" . $row['Location'] . "</td>";
                echo "<td>" . $row['Description'] . "</td>";
                echo "<td>" . $row['Evidence_ID'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No crime scenes found.</p>";
        }

        $conn->close(); // Close the database connection
        ?>
        <a href="index.html">Back to Home</a>
    </div>
</body>
</html>
