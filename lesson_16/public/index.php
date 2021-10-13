<?php

use Lesson_16\User;

require '../vendor/autoload.php';

$user = new User();

$user->fill([
    'first_name'    => 'Ruben',
    'last_name'     => 'rl',
    'nickname'      => 'rrl'
]);

if (isset($user->nickname)){
    echo $user->getAttribute('nickname');
}

echo "<p>Bienvenido {$user->first_name} {$user->last_name} {$user->nickname}</p>";
