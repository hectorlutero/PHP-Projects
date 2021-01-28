<?php

include 'database.php';

//check if the form is submitted
if (isset($_POST['submit'])) {
    $user     = mysqli_real_escape_string($conn, $_POST['user']);
    $message  = mysqli_real_escape_string($conn, $_POST['message']);

    // Set timezone
    date_default_timezone_set('America/Sao_Paulo');
    $time     =  date('h:i:s a', time());
    
    // Validade input
    if (!isset($user) || $user == "" || !isset($message) || $message == "") {
        $error = "Please fill in your name and a message";
        header("Location: index.php?error=" . urlencode($error));
    } else {
        // Inserting data to the DB
        $query = "INSERT INTO shouts (user, message, time) VALUES ('$user', '$message', '$time')";
        if (!mysqli_query($conn, $query)) {
            die ('Error: ' . mysqli_error($conn));
        } else {
            header("Location: index.php");
            exit();
        }
    }
}