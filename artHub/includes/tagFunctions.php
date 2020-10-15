<?php
function addTags($textInput) {

    // Convert return characters to the Unix new lines
    // Convert for Windows first, then for Mac
    $textWindows = str_replace("\r\n", "\n", $textInput);
    $textUnix= str_replace("\r", "\n", $textWindows);

    // Get an array of paragraphs
    $paragraphs = explode("\n\n", $textUnix);

    // Add tags to each paragraph
    $text = '';
    foreach($paragraphs as $p) {
        $p = ltrim($p);

        $first_char = substr($p, 0, 1);
        if ($first_char == '*') {
            // Add <ul> and <li> tags
            $p = '<ul>' . $p . '</li></ul>';
            $p = str_replace("*", '<li>', $p);
            $p = str_replace("\n", '</li>', $p);
        } else {
            // Add <p> tags
            $p = '<p>' . $p . '</p>';
        }
        $text .= $p;
    }

    return $text;
}