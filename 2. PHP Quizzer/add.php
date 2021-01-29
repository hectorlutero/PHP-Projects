<?php
    include 'database.php';

    if (isset($_POST['submit'])) {

        // Get the Post Variables
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];
        // Choices array
        $choices = array ();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];

        // Question Query
        $query = "INSERT INTO `questions` (question_number, text) VALUES ('$question_number', '$question_text')";

        // Run query
        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

        // Validade insert
        if ($insert_row) {
            foreach ($choices as $choice => $value) {
                if ($value != '') {
                    if ($correct_choice == $choice) {
                        $is_correct = 1;
                    } else {
                        $is_correct = 0;
                    }
                    // Choice query
                    $query = "INSERT INTO `choices` (question_number, is_correct, text) VALUES ('$question_number', '$is_correct', '$value')";

                    // Run query
                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    // Validade insert
                    if ($insert_row) {
                        continue;
                    } else {
                        die('Error : (' . $mysqli->errno .')' . $mysqli->error);
                    }
                }
            }
            $msg = "A question has been added";
        }
    }
    /*
    *   Get total questions
    */

    $query = "SELECT * FROM questions";
    // Get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    $next = $total+1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizzer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Add A Question</h2>
            <?php 
            if (isset($msg)) { 
                echo "<p> $msg </p>";
            }  
            ?>
            <form action="add.php" method="post">
                <p>
                    <label>Question Number: </label>
                    <input type="number" name="question_number" value="<?= $next; ?>">
                </p>
                <p>
                    <label>Question Text: </label>
                    <input type="text" name="question_text">
                </p>
                <p>
                    <label>Choice #1</label>
                    <input type="text" name="choice1">
                </p>
                <p>
                    <label>Choice #2</label>
                    <input type="text" name="choice2">
                </p>
                <p>    
                    <label>Choice #3</label>
                    <input type="text" name="choice3">
                </p>
                <p>
                    <label>Choice #4</label>
                    <input type="text" name="choice4">
                </p>
                <p> 
                    <label>Correct Choice Number: </label>
                    <input type="number" name="correct_choice">
                </p>    
                <p>
                    <input type="submit" name="submit" value="submit">
                </p>
            </form>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2021, Quizzer
        </div>
    </footer>
</body>
</html>