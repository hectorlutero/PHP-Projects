<?php 

include 'database.php';

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
    session_start();
}
if (isset($_GET['n'])) {
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

}

?>

<?php 
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