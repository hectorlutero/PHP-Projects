<?php

//Format the Date

function formatDate($date) {
    return date('F j, Y, g:i a', strtotime($date));
    // To see different formats visit PHP.net date format
}

// Post Text Shorter

function shortenText($text, $chars = 450) {
    $text = $text." ";
    // What this substr() function does is, it will receive three parameters, the actual string you wanna treat, the index where to begin, and the amount of character its gonna count, to cut the text. 
    $text = substr($text, 0 , $chars);
    // Knowing the function can cut a word in the middle, so we treat it with the strrpos() to find a position of next space, to make it cut there.
    $text = substr($text, 0 , strrpos($text, ' '));
    //Then we just concatenate with three dots to indicates that there's more text to read. 
    $text = $text . "...";
    return $text;
}