<?php

require '../vendor/autoload.php';

use Lesson_27\User;

$user = new User([
    'name' => 'Ruben',
    'birthDate' => '07/09/1959'
]);

echo "<p>{$user->name} tiene {$user->age} años</p>";

exit();