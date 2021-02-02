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
        
        $query = "SELECT * FROM questions";
        /*
        *   Get total questions
        */
        
        // Get results
        $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $total = $results->num_rows;
        $next = $total+1;
    }
}

