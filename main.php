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
    echo 'test';

}

invert_string('This is a test');
invert_string(array());