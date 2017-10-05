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
$tip = -1;
$people = 1;
$service = 'uncheked';
$total = 0;


$base_total = floatval($form->get('base_total', 0));
$people = intval($form->get('split', 1));
$tip = floatval($form->get('choose_tip', -1));
$service = $form->get('service');

if($form->isSubmitted()) {
    $errors = $form->validate([
        'base_total' => 'required|numeric|min:0',
        'choose_tip' => 'required|min:-1',
    ]);

    if (!is_numeric($people) || $people == 0) {
        $people = 1;
    }

    $bill = new Bill($tip, $base_total, $people, $service);

    $total = round($bill->getTotal(), 2);
}
