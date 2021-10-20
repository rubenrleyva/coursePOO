<?php

require '../vendor/autoload.php';

use Lesson_26\User;

$user = new User([
    'name' => 'Ruben',
    'birthDate' => '07/09/1959'
]);

$user->age;

echo "<p>{$user->name} tiene {$user->age} años</p>";

exit();