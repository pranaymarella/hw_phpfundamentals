<?php require('logic.php'); ?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>PHP_Fundamentals</title>
    <meta charset='utf-8'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/styles.css' rel='stylesheet'>
</head>

<body class='text-center'>
    <h1>Bill Splitter</h1>

    <form method='GET'>
        <label for='base_total'>How much was the bill after tax? <span class="required">Required</span></label>
        <input type='text' name='base_total' placeholder='$ Total After Tax' id='base_total'>
        <br>

        <label for='split'>How many people are splitting the bill?</label>
        <input type='text' name='split' placeholder='# of people splitting' id='split'>
        <br>

        <label for='choose_tip'>How much would you like to tip? <span class="required">Required</span></label>
        <select name='choose_tip' id='choose_tip' class='dropdown'>
            <option value='-1'>% to tip</option>
            <option value='0' <?php if ($tip == 0) echo 'SELECTED'?>>0%</option>
            <option value='.15' <?php if ($tip == 0.15) echo 'SELECTED'?>>15%</option>
            <option value='.20' <?php if ($tip == 0.20) echo 'SELECTED'?>>20%</option>
            <option value='.25' <?php if ($tip == 0.25) echo 'SELECTED'?>>25%</option>
        </select>
        <br>

        <label>How would you rate the service?</label>
        <fieldset class='radios'>
            <label><input type='radio' name='service' value='Very Bad' <?php if ($service == 'Very Bad') echo 'CHECKED'?>> Very Bad </label>
            <label><input type='radio' name='service' value='Bad' <?php if ($service == 'Bad') echo 'CHECKED'?>> Bad </label>
            <label><input type='radio' name='service' value='Okay' <?php if ($service == 'Okay') echo 'CHECKED'?>> Okay </label>
            <label><input type='radio' name='service' value='Good' <?php if ($service == 'Good') echo 'CHECKED'?>> Good </label>
            <label><input type='radio' name='service' value='Excellent' <?php if ($service == 'Excellent') echo 'CHECKED'?>> Excellent </label>
        </fieldset>
        <br>
        <input type='submit' class='btn btn-success btn-lg' value='Calculate'>
    </form>

    <?php if (count($errors) != 0) : ?>
        <?php foreach ($errors as $error) : ?>
            <div class="alert alert-warning"><?=$error?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($total > 0) : ?>
        <div class="alert alert-success" role="alert">
            The total bill after tip is: <strong>$<?=$total?></strong>. This is split between <strong><?=$people?></strong> people.
        </div>
    <?php endif; ?>
</body>
</html>
