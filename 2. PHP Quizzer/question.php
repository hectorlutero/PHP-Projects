<?php include 'database.php'; ?>
<?php
    session_start();
    // Set question number
    $number = (int) $_GET['n'];

    /*
    *   Get Question
    */
    $query = "SELECT * FROM `questions` WHERE question_number = $number";

    // Get result
    $result = $mysqli->query($query) or die ($mysqli->error.__LINE__);

    $question = $result->fetch_assoc();

    /*
    *   Get Choices
    */
    $query = "SELECT * FROM `choices` WHERE question_number = $number";

    // Get result
    $choices = $mysqli->query($query) or die ($mysqli->error.__LINE__);

        /*
    *   Get total questions
    */

    $query = "SELECT * FROM questions";
    // Get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    

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
            <h2><?= $question['text']; ?></h2>
            <div class="current">Question <?= $number ?> of <?= $total ?></div>
            <p class="question">Some question, question?</p>
            <form action="process.php" method="post">
                <ul class="choices">
                <?php while ($row = $choices->fetch_assoc()) : ?>
                    <li><input type="radio" name="choice" value="<?= $row['id']; ?>" /><?=  $row['text']; ?></li>
                <?php endwhile; ?>
                </ul>
                <input type="submit" name="submit" value="Send">
                <input type="hidden" name="number" value="<?= $number ?>">
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