<?php

// CONNECT TO MYSQL
$conn = mysqli_connect("localhost", "root", "", "shoutit");

// TEST CONNECTION
if (mysqli_connect_errno()) {
    echo 'Failed to connect to MySQL: ' . $mysqli_connect_error();
}

