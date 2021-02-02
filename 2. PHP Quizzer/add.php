<?php
    include 'database.php';
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
            <form action="process.php" method="post">
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