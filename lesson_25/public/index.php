<?php

require '../vendor/autoload.php';
require '../vendor/Laravel/Macroable.php';
require '../vendor/Laravel/HtmlBuilder.php';

use Laravel\HtmlBuilder;

HtmlBuilder::macro('success', function ($message) {
    return "<p style='background-color: darkred; border-color: black; color: azure;padding: 10px;'>$message</p>";
});

$html = new HtmlBuilder();

echo $html->hr();
echo $html->success('Hola Rubencillo');

exit();