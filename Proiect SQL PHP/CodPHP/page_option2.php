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

        form {
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimanta List</title>
</head>
<body>
    <h2> Să se găsească detaliile laptopurilor cu diagonala de:</h2>

    <!-- Form with a button to trigger the query -->
    <form method="post" action="display_results3b.php">
        <input type="number" step="0.1" name="diagonal" required>
        <button type="submit" name="submit">Obtineti rezultatul</button>
    </form>

</body>
</html>
