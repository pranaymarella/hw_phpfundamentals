<?php

require('Form.php');
require('helpers.php');
require('bill.php');

use DWA\Bill;
use DWA\Form;

$form = new Form($_GET);

$errors = [];
$tip_str = '-1';
$base_total = 0;
$tip = 0;
$people = 1;
$service = 'uncheked';
$total = 0;


$base_total = floatval($form->get('base_total', 0));
$people = intval($form->get('split', 1));
$tip = floatval($form->get('choose_tip', 0));
$service = $form->get('service');

if (!is_numeric($base_total)) {
    array_push($errors, 'You must enter your bill total!');
}


if (!is_numeric($people) || $people < 1) {
    $people = 1;
}


if (!is_numeric($tip) || $tip == -1) {
    array_push($errors, 'You must choose a valid tip!');
}


$bill = new Bill($tip, $base_total, $people, $service);

$total = round($bill->getTotal(), 2);
