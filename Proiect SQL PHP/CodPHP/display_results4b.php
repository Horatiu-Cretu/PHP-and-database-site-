<?php
include("database.php");

// Initialize the result variable
$result = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If submitted, execute the SQL query for PC fabricants
    $sql = "SELECT pc1.model AS model1, pc2.model AS model2, produs1.fabricant AS fabricant1, produs2.fabricant AS fabricant2
            FROM PC pc1
            JOIN Produs produs1 ON pc1.model = produs1.model
            JOIN PC pc2 ON pc1.model < pc2.model
            JOIN Produs produs2 ON pc2.model = produs2.model
            WHERE produs1.fabricant = produs2.fabricant";

    $query_result = mysqli_query($conn, $sql);

    // Check for errors
    if (!$query_result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Fetch the results
    while ($row = mysqli_fetch_assoc($query_result)) {
        $result[] = $row;
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Fabricants</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        p {
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>
<body>
    <h2>PC Fabricants</h2>

    <?php
    // Display the results if available
    if (!empty($result)) {
    ?>
        <table>
            <thead>
                <tr>
                    <th>Model 1</th>
                    <th>Model 2</th>
                    <th>Fabricant 1</th>
                    <th>Fabricant 2</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the results in a table
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["model1"] . "</td>";
                    echo "<td>" . $row["model2"] . "</td>";
                    echo "<td>" . $row["fabricant1"] . "</td>";
                    echo "<td>" . $row["fabricant2"] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "<p>No results found.</p>";
    }
    ?>

</body>
</html>
