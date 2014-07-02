<?php
/**
 * Created by PhpStorm.
 * User: jecnua
 * Date: 02/07/14
 */

function invert_string($invertMe){

    if (!is_string($invertMe)) {
        throw new \Exception('You need to pass a string');
    }
    $stringAsArray = str_split($invertMe);
    $numOfLetters = count($stringAsArray);
    $invertedArray = array();
    while ($numOfLetters > 0){
        $numOfLetters--;
        $invertedArray[] = $stringAsArray[$numOfLetters];
    }
    return implode('',$invertedArray);
}



echo invert_string('This is a test');
