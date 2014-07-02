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
    foreach ($dataSet as $check){
        if ($check != 0){
            return false;
        }
    }
    return true;
}

function can_be_rearranged_as_a_palindrome($originalString){
    $originalStringAsArray = str_split($originalString);
    if (count($originalStringAsArray) == 1){
        return true;
    }
    $dataSet = array();
    foreach ($originalStringAsArray as $letter){
        if (!isset($dataSet[$letter])){
            $dataSet[$letter] = 1;
        }
        else {
            $dataSet[$letter] = $dataSet[$letter] + 1;
        }
    }
    $oneException = true;
    foreach($dataSet as $numLetterRepetition){
        if ((($numLetterRepetition % 2) != 0)){
            if ($oneException){
                $oneException = false;
            }
            else {
                return false;
            }
        }
    }
    return true;
}

echo invert_string('This is a test');
echo "\n";
var_dump(is_anagram('home', 'mohe'));
var_dump(is_anagram('test', 'home'));
var_dump(is_anagram('hooooome', 'mohe'));
echo "palindromes\n";
var_dump(can_be_rearranged_as_a_palindrome('home'));
var_dump(can_be_rearranged_as_a_palindrome('aall'));
var_dump(can_be_rearranged_as_a_palindrome('aalel'));
var_dump(can_be_rearranged_as_a_palindrome('aalll'));
var_dump(can_be_rearranged_as_a_palindrome('aalllf'));