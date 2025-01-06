<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Suspects</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table th {
            background-color: #f2f2f2;
            text-align: left;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
        }
        .search-box {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Suspects</h1>
        
        <!-- Search Form -->
        <div class="search-box">
            <form method="GET" action="view_suspects.php">
                <label for="case_id">Search by Case ID:</label>
                <input type="number" name="case_id" id="case_id" placeholder="Enter Case ID" required>
                <button type="submit">Search</button>
            </form>
        </div>

        <?php
        include 'config.php'; // Include database configuration

        // Check if a search query is provided
        $case_id = isset($_GET['case_id']) ? intval($_GET['case_id']) : null;

        // SQL to fetch suspect data
        if ($case_id) {
            $sql = "SELECT * FROM Suspect WHERE Case_ID = $case_id";
        } else {
            $sql = "SELECT * FROM Suspect";
        }

        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                        <th>Suspect ID</th>
                        <th>Name</th>
                        <th>Personal Details</th>
                        <th>Associated Case ID</th>
                      </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Suspect_ID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Personal_details']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Case_ID']) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No suspects found for the specified Case ID.</p>";
            }
        } else {
            echo "<p>Error fetching suspects: " . $conn->error . "</p>";
        }

        $conn->close(); // Close the database connection
        ?>
        <a href="index.html">Back to Home</a>
    </div>
</body>
</html>
