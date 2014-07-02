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

function is_anagram($originalString, $anagramCandidate){
    $originalStringAsArray = str_split($originalString);
    $dataSet = array();
    foreach ($originalStringAsArray as $letter){
        if (!isset($dataSet[$letter])){
            $dataSet[$letter] = 1;
        }
        else {
            $dataSet[$letter] = $dataSet[$letter] + 1;
        }
    }
    $possibleAnagramAsArray = str_split($anagramCandidate);
    foreach ($possibleAnagramAsArray as $letter){
        if (!isset($dataSet[$letter])){
            return false;
        }
        else {
            $dataSet[$letter] = $dataSet[$letter] - 1;
        }
    }
    return true;
}

echo invert_string('This is a test');
echo "\n";
var_dump(is_anagram('home', 'mohe'));
var_dump(is_anagram('test', 'home'));