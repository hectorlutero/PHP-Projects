<?php

include 'database.php';

session_start();

// Check to see if score is set_error_handler

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;

}


if(isset($_POST['submit'])) {
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    $next = $number+1;

    // Get total questions
    $query = "SELECT * FROM `questions`";

    // Get result
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;

    // Get correct choice

    $query = "SELECT * FROM `choices` WHERE question_number = $number AND is_correct = 1";
    
    // Get Result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);

    // Get Row
    $row = $result->fetch_assoc();

    print_r($row);
    echo "<br>";
    // Set correct choice
    $correct_choice = $row['id'];

    echo "correct choice: " . $correct_choice;
    echo "<br>";
    echo "selected choice: " . $selected_choice;
    echo "<br>";

    // Compare
    if ($correct_choice == $selected_choice) {
        // Answer is correct
        $_SESSION['score']++;
    }

    print_r($_SESSION['score']);


    // Check if it is the last question
    if($number == $total){
        header("Location: final.php");
        exit();
    } else {
        header("Location: question.php?n=$next");
    }

}

