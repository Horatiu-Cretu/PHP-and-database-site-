<?php
include("database.php");

// Initialize the result variable
$result = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // If submitted, execute the SQL query to get related imprimantas
    $sql = "SELECT *
            FROM Produs
            WHERE model IN (
                SELECT model FROM Produs WHERE pret = (
                    SELECT pret FROM Produs WHERE model = 123 AND categorie = 'IMPRIMANTA'))";

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
    <title>Related Printers</title>
</head>
<body>
    <h2>Related Printers</h2>

    <?php
    // Display the results if available
    if (!empty($result)) {
    ?>
        <table border="1">
            <thead>
                <tr>
                    <!-- Adjust column headers based on your Imprimanta table structure -->
                    <th>ID</th>
                    <th>Model</th>
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
                    echo "<td>" . $row["id"] . "</td>";
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
