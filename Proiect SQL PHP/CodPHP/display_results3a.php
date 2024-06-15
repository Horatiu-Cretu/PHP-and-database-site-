<?php
include("database.php");

// Initialize the result variable
$result = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If submitted, execute the SQL query
    $sql = "SELECT * FROM Imprimanta WHERE culoare = 'D' ORDER BY tip ASC";
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
    <title>Imprimanta List</title>
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
    <h2>Imprimanta List (Culoare 'D')</h2>

    <?php
    // Display the results if available
    if (!empty($result)) {
    ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tip</th>
                    <th>Culoare</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Display the results in a table
                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>" . $row["model"] . "</td>";
                    echo "<td>" . $row["tip"] . "</td>";
                    echo "<td>" . $row["culoare"] . "</td>";
                    // Add more columns as needed
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
