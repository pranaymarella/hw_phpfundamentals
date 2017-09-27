<?php

require('helpers.php');

$errors = [];
$tip_str = '-1';
$base_total = 0;
$tip = 0;
$people = 1;
$service = 'uncheked';


// validating for the bill total
if (isset($_GET['base_total'])) {
    // try to convert user input to a float
    $base_total = floatval($_GET['base_total']);
    // make sure that we have a number that is also greater than 0
    if (!is_numeric($base_total) || $base_total == 0) {
        array_push($errors, 'You must enter your bill total!');
    }
} else {
    $base_total = 0;
}

if (isset($_GET['split'])) {
    $split = intval($_GET['split']);

    if (is_numeric($split) and  $split > 1) {
        $people = $split;
    }
}


// validating for the tip
if (isset($_GET['choose_tip'])) {
    // try to convert user input to a float
    $tip_str = $_GET['choose_tip'];
    $tip = floatval($tip_str);

    // make sure that we have a number
    if (!is_numeric($tip) || $tip == -1) {
        array_push($errors, 'You must choose a valid tip!');
    }
} else {
    $tip = 0;
}

// Getting the radio button input
if (isset($_GET['service'])) {
    $service = $_GET['service'];
}


$total = ($base_total + ($tip * $base_total)) / $people;
