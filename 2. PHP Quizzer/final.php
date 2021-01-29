<?php 

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;

}


session_start() 

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
           <h2>You're Done!</h2>
            <p>Congrats! You have completed the test.</p>
            <p>Final Score: <?= $_SESSION['score']; ?></p>
            <a href="question.php?n=1" class="start">Take again</a>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2021, Quizzer
        </div>
    </footer>

    <?php session_unset(); session_destroy(); ?>
</body>
</html>