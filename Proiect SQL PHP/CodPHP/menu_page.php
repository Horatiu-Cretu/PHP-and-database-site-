<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>


    <form method="post">
        <h2>Choose an option:</h2>

        <label><input type="radio" name="choice" value="option1"> Exercitiul 3.a</label>
        <label><input type="radio" name="choice" value="option2"> Exercitiul 3.b</label>
        <label><input type="radio" name="choice" value="option3"> Exercitiul 4.a</label>
        <label><input type="radio" name="choice" value="option4"> Exercitiul 4.b</label>
        <label><input type="radio" name="choice" value="option5"> Exercitiul 5.a</label>
        <label><input type="radio" name="choice" value="option6"> Exercitiul 5.b</label>
        <label><input type="radio" name="choice" value="option7"> Exercitiul 6.a</label>
        <label><input type="radio" name="choice" value="option8"> Exercitiul 6.b</label>



        <button type="submit" name="submit_choices">Submit Choice</button>
    </form>

    <?php
    if (isset($_POST['submit_choices'])) {
        // Check if a choice is selected
        if (isset($_POST['choice'])) {
            $selectedChoice = $_POST['choice'];
            switch ($selectedChoice) {
                case 'option1':
                    header('Location: page_option1.php');
                    break;
                case 'option2':
                    header('Location: page_option2.php');
                    break;
                case 'option3':
                    header('Location: page_option3.php');
                    break;
                case 'option4':
                    header('Location: page_option4.php');
                    break;
                case 'option5':
                    header('Location: page_option5.php');
                    break;
                case 'option6':
                    header('Location: page_option6.php');
                    break;
                case 'option7':
                    header('Location: page_option7.php');
                    break;
                case 'option8':
                    header('Location: page_option8.php'); 
                    break;
                default:
                    // Handle unexpected choices
                    break;
            }
        } else {
            echo '<p>Please select an option.</p>';
        }
    }
    ?>

</body>
</html>
